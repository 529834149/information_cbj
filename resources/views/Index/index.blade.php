@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="micronews-container w1000">
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
                    <div class="main">
                        <div class="list-item" id="LAY_demo2">
                            {{--<div class="item">--}}
                                {{--<a href="details.html">--}}
                                    {{--<img src="{{ asset('default/static/images/news_img11.jpg') }}">--}}
                                {{--</a>--}}
                                {{--<div class="item-info">--}}
                                    {{--<h4><a href="details.html">北京的卫生部门调查五星级酒店清洁 “丑闻” 已现场取样，还消费者真相</a></h4>--}}
                                    {{--<div class="b-txt">--}}
                                        {{--<span class="label">娱乐</span>--}}
                                        {{--<span class="icon message">--}}
                                          {{--<i class="layui-icon layui-icon-dialogue"></i>--}}
                                          {{--500条--}}
                                        {{--</span>--}}
                                        {{--<span class="icon time">--}}
                                          {{--<i class="layui-icon layui-icon-log"></i>--}}
                                          {{--10分钟前--}}
                                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            @include('Index._topic_list', ['topics' => $topics])
                            {!! $topics->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
                    <div class="popular-info">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <h3>热门资讯</h3>
                            </div>
                            <div class="layui-card-body">
                                <ul class="list-box">
                                    <li class="list">

                                        <a href="list.html">你和我的倾城时光</a><i class="heat-icon"></i>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">顶级酒店内幕被曝光</a><i class="heat-icon"></i>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">王思聪抽奖</a><i class="heat-icon"></i>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">王者荣耀上官婉儿</a>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">妻子的浪漫旅行</a>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">海底捞回应员工偷拍</a>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">扎克伯格禁止高管用iPhone</a>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">王思聪抽手机壳送手机</a>

                                    </li>
                                    <li class="list">

                                        <a href="list.html">每天闹钟20次提醒男友抽奖 </a>

                                    </li>
                                    <li class="list">

                                        <a href=list.html#">詹姆斯收藏比赛用球</a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('default/layui/layui.js') }}"></script>

    <script>
        layui.config({
            base: '/default/static/js/'
        }).use('index',function(){
            var index = layui.index;
            index.banner()
            index.seachBtn()
            index.arrowutil()
        });
    </script>
@stop