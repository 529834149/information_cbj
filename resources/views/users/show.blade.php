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
                                        <img src="{{ $user->avatar }}" width="80" height="80"></a>
                                    <p class="name"><i class="layui-icon  layui-icon-friends"></i>作者：{{ $user->name }}</p>
                                    <p class="name"><i class="layui-icon  layui-icon-date"></i>注册于：{{ $user->created_at->diffForHumans() }}</p>
                                    <p class="name"><i class="layui-icon  layui-icon-template-1"></i>个人简介：</p>
                                    @if($user->introduction )
                                        <p class="name" style="  text-decoration:underline;color: #c1c1c1;">{{ $user->introduction }}</p>
                                    @else
                                        <p class="name" style="  text-decoration:underline;color: #c1c1c1;">暂无简介</p>
                                    @endif

                                    <p class="name">
                                        {{--<a href="{{ route('users.edit', Auth::id()) }}">--}}
                                            {{--<i class="layui-icon  layui-icon-edit"></i>编辑资料--}}
                                        {{--</a>--}}
                                        <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-success btn-block" aria-label="Left Align" style="color: #fff!important;">
                                            <i class="layui-icon  layui-icon-edit"></i> 编辑资料
                                        </a>
                                    </p>
                                    <p class="name">
                                        <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align" style="color: #fff!important;">
                                            <i class="layui-icon  layui-icon-add-1"></i>   新建帖子
                                        </a>
                                    </p>
                                </div>
                                <div class="layui-card-body">
                                    <ul class="tab" id="tabHeader" lay-filter="myInfo">
                                        <li lay-id="pl">我的话题</li>
                                        <li lay-id="sc">我的回复</li></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs12 layui-col-sm12 layui-col-md9">
                        <div class="main">
                            <div class="leave-message" id="tabBody">
                                <!-- 我的话题 -->
                                <div class="content-box">
                                    @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
                                    {{--<div id="micronews-details-test" style="text-align: center;"></div>--}}
                                </div>
                                <!-- 结束-我的评论 -->
                                <!-- 我的收藏 -->
                                <div class="content-box">
                                    <div class="ulCommentList">
                                        @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
                                    </div>

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