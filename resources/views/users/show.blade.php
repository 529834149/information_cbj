@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="micronews-persInfo-wrap">
        <div class="micronews-container micronews-details-container micronews-persInfo-content w1000">
            <div class="layui-fluid">
                <div class="layui-row">
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md3">
                        <div class="popular-info">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    <a href="#">
                                        <img src="{{ asset('default/static/images/header.png') }}"></a>
                                    <p class="name"><i class="layui-icon  layui-icon-friends"></i>作者：{{ $user->name }}</p>
                                    <p class="name"><i class="layui-icon  layui-icon-date"></i>注册于：{{ $user->created_at->diffForHumans() }}</p>
                                    <p class="name"><i class="layui-icon  layui-icon-template-1"></i>个人简介：</p>
                                    <p class="name" style="  text-decoration:underline;color: #c1c1c1;">{{ $user->introduction }}</p>
                                    <p class="name">
                                        <a href="{{ route('users.edit', Auth::id()) }}">
                                            <i class="layui-icon  layui-icon-edit"></i>编辑资料
                                        </a>
                                    </p>
                                </div>
                                <div class="layui-card-body">
                                    <ul class="tab" id="tabHeader" lay-filter="myInfo">
                                        <li lay-id="pl">我的评论</li>
                                        <li lay-id="sc">我的收藏</li></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md9">
                        <div class="main">
                            <div class="leave-message" id="tabBody">
                                <!-- 我的评论 -->
                                <div class="content-box">
                                    <div class="ulCommentList">
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <img src="{{ asset('default/static/images/header.png') }}"></a>
                                            <div class="item-cont">
                                                <div class="cont">
                                                    <p>
                                                        <span class="name">我是锦鲤</span>
                                                        <span class="time">1小时前</span></p>
                                                    <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p></div>
                                            </div>
                                        </div>

                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <img src="{{ asset('default/static/images/header.png') }}"></a>
                                            <div class="item-cont">
                                                <div class="cont">
                                                    <p>
                                                        <span class="name">我是锦鲤</span>
                                                        <span class="time">1小时前</span></p>
                                                    <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p></div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <img src="{{ asset('default/static/images/header.png') }}"></a>
                                            <div class="item-cont">
                                                <div class="cont">
                                                    <p>
                                                        <span class="name">我是锦鲤</span>
                                                        <span class="time">1小时前</span></p>
                                                    <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="micronews-details-test" style="text-align: center;"></div>
                                </div>
                                <!-- 结束-我的评论 -->
                                <!-- 我的收藏 -->
                                <div class="content-box">
                                    <div class="ulCommentList">
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liCont">
                                            <div class="item">
                                                <div class="item-info">
                                                    <h4>
                                                        <a href="details.html">想要头发好只要不洗头？ 英国女子留1.83米长发自爆近20年没洗过</a></h4>
                                                    <div class="b-txt">
                                                        <span class="label">娱乐</span>
                                                        <span class="icon message">
                                                        <i class="layui-icon layui-icon-dialogue"></i>500条</span>
                                                        <span class="icon time">
                                                        <i class="layui-icon layui-icon-log"></i>2018.08.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="micronews-details-test1" style="text-align: center;"></div>
                                </div>
                                <!-- 结束-我的收藏 --></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('default/layui/layui.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        layui.config({
            base: '/default/static/js/'
        }).use(['index','element'],function(){
            var index = layui.index,$ = layui.$,element = layui.element;
            index.Page('micronews-details-test',50)
            index.Page('micronews-details-test1',50)
            index.arrowutil()
            var collOff = true;
            $('.Collection').on('click',function(){
                if(collOff){
                    $(this).addClass('active')
                }else{
                    $(this).removeClass('active')
                }
                collOff = !collOff
            })



            index.seachBtn()
            element.tab({
                headerElem: '#tabHeader>li' //指定tab头元素项
                ,bodyElem: '#tabBody>.content-box' //指定tab主体元素项
            });
            var layid = location.hash.replace(/^#myInfo=/, '');
            element.tabChange('myInfo', layid);

            //监听Tab切换，以改变地址hash值
            element.on('tab(myInfo)', function(){
                location.hash = 'myInfo='+ this.getAttribute('lay-id');
            });

            var url = window.location.hash;
            var loc = url && url.substring(url.lastIndexOf('=')+1, url.length) || false;
            if(loc){
                $("[lay-id="+loc+"]").trigger("click")
            }else{
                $("[lay-id=pl]").trigger("click")
            }
        });
    </script>
@stop