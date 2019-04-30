<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WxController extends Controller
{
	protected $appid;
    protected $secret;
    protected $accessToken;
     
    function __construct(){
        $this->appid       = "wxd929f7597eac5944";
        $this->secret      = "6e96376e119b5788704b10fb88aa64b4";
        $this->accessToken = $this->getAccessToken();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	\Log::info($_GET);
        if(!isset($_GET['echostr'])){
            $this->responseMsg();
        }else{
            $this->valid();
        } 
    }
    
    public function weixin(){ 
    	$scene_str = "lrfun".time(); //"lrfun" . time(); //这里建议设唯一值(如：随机字符串+时间戳)
	    $result = json_decode($this->getQrcodeByStr($scene_str), true); 
	    $qrcode = $this->generateQrcode($result['ticket']); //生成二维码    
    	return view('wx.weixin')->with('qrcode',$qrcode);
    } 


	/***1
     * 生成带参数的二维码
     * @scene_str 自定义参数（字符串）
     * @return
     **/
    public function getQrcodeByStr($scene_str){
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$this->accessToken;
        $data = array(
            "expire_seconds" => 3600, //二维码的有效时间（1小时）
            "action_name" => "QR_STR_SCENE",
            "action_info" => array("scene" => array("scene_str" => $scene_str))
        );
        $result = $this->httpRequest($url, json_encode($data));
        return $result;
    }
     
     
     /**2
     * 换取二维码
     * @ticket
     * @return
     */
    public function generateQrcode($ticket){
        return "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
    }
    
    
    
    
    
    /***0
     * 获取access_token
     * token的有效时间为2小时，这里可以做下处理，提高效率不用每次都去获取，
     * 将token存储到缓存中，每2小时更新一下，然后从缓存取即可
     * @return
     **/
    private function getAccessToken(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->secret;
        $res = json_decode($this->httpRequest($url),true);
        return $res['access_token'];
    }
     
    /***
     * POST或GET请求
     * @url 请求url
     * @data POST数据
     * @return
     **/
    private function httpRequest($url, $data = ""){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if(!empty($data)){  //判断是否为POST请求
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    
    public function valid(){
        $nonce     = $_GET['nonce'];
        $token     = '1234567';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str  == $signature ){
            //第一次接入weixin api接口的时候
            echo $echostr;
            exit;
        }
    }

    public function responseMsg()
    { 
        if (!empty($GLOBALS["HTTP_RAW_POST_DATA"])){
            $postObj = simplexml_load_string($GLOBALS["HTTP_RAW_POST_DATA"], 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
            switch($RX_TYPE){
                case "text":
                    $resultStr = $this->handleText($postObj);
                    break;
                case "event":
                    $resultStr = $this->handleEvent($postObj);
                    break;
                default:
                    $resultStr = "Unknow msg type: ".$RX_TYPE;
                    break;
            }
            echo $resultStr;
        }else {
            echo "";
            exit;
        }
    } 
    
    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";
        if(!empty( $keyword ))
        {
            $msgType = "text";
            $contentStr = "欢迎您关注好运平台！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }else{
            echo "请输入...";
        }
    }

    public function handleEvent($object)
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "感谢您关注【好运平台】";
//                $contentStr = "感谢您关注【好运平台】"."\n".$object->ToUserName."\n".$object->FromUserName."\n".$object->FromUserName."\n".$object->MsgType."\n".$object->Event."\n".$object->EventKey."\n".$object->Ticket;
                $openid = (string)$object->FromUserName; //数据类型转换为字符串,mmp这个问题找了好久
                $refer_id = explode('_',$object->EventKey); //$object->EventKey返回的是qrsence_123这种类型
                 $this->createuserinfo($openid,$refer_id[1]);//获取用户信息
                break;
            case "SCAN":
                $contentStr = "您已关注过，谢谢！";
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    } 
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    } 
    
    
    public function createuserinfo($openid,$refer_id)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $this->accessToken . "&openid=" . $openid;
        $user= $this->request_get($url);
        $user = json_decode($user,true);
        $users = array(
            'openid' =>$openid,
            'nickname' =>$user['nickname'],
            'avatar' =>$user['headimgurl'],
            'sex' =>$user['sex'],
            'unionid' =>$user['unionid'],
            'status' => 1,
            'reg_time' =>$user['subscribe_time'],//关注公众号的时间
            'bind_user'=>$refer_id
        );
        \Log::info($users);
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
    /***
     * 获取openID和unionId
     * @code 微信授权登录返回的code
     * @return
     **/
    public function getOpenIdOrUnionId($code){
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->secret."&code=".$code."&grant_type=authorization_code";
        $data = $this->httpRequest($url);
        return $data;
    }
     
    /***
     * 通过openId获取用户信息
     * @openId
     * @return
     **/
    public function getUserInfo($openId){
        $url  = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->accessToken."&openid=".$openId."&lang=zh_CN";
        $data = $this->httpRequest($url);
        return $data;
    }
     
    /***
     * 发送模板短信
     * @data 请求数据
     * @return
     **/
   /* public function sendTemplateMessage($data = ""){
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->accessToken;
        $result = $this->httpRequest($url, $data);
        return $result;
    }*/
     
    /***
     * 生成带参数的二维码
     * @scene_id 自定义参数（整型）
     * @return
     **/
    public function getQrcode($scene_id){
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$this->accessToken;
        $data = array(
            "expire_seconds" => 3600, //二维码的有效时间（1小时）
            "action_name" => "QR_SCENE",
            "action_info" => array("scene" => array("scene_id" => $scene_id))
        );
        $result = $this->httpRequest($url, json_encode($data));
        return $result;
    }
     
    

	
 
    /***
     * 回调函数
     **/
    public function callback(){
        $callbackXml = file_get_contents('php://input'); //获取返回的xml
        //下面是返回的xml
        //<xml><ToUserName><![CDATA[gh_f6b4da984c87]]></ToUserName> //微信公众号的微信号
        //<FromUserName><![CDATA[oJxRO1Y2NgWJ9gMDyE3LwAYUNdAs]]></FromUserName> //openid用于获取用户信息，做登录使用
        //<CreateTime>1531130986</CreateTime> //回调时间
        //<MsgType><![CDATA[event]]></MsgType>
        //<Event><![CDATA[SCAN]]></Event>
        //<EventKey><![CDATA[lrfun1531453236]]></EventKey> //上面自定义的参数（scene_str）
        //<Ticket><![CDATA[gQF57zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyY2ljbjB3RGtkZWwxbExLY3hyMVMAAgTvM0NbAwSAOgkA]]></Ticket> //换取二维码的ticket
        //</xml>
        $data = json_decode(json_encode(simplexml_load_string($callbackXml, 'SimpleXMLElement', LIBXML_NOCDATA)), true); //将返回的xml转为数组
        if(count($data)){
            $userInfo = $this->getUserInfo($data['FromUserName']); //获取用户信息
            //这里把返回的数据写入数据库（注：务必将“EventKey”也存到数据表中，后面检测登录需用到此唯一值查询记录）
            //用于前台做检测该用户扫码之后是否有关注公众号，关注了就自动登录网站
            //原理：前台通过自定义的参数（最好设成值唯一）查询数据标是否有此记录，若有则登录。
        }
    }



























    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
