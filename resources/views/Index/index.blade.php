@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="micronews-container w1000">
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
                    <div class="main">
                        <div class="list-item" id="LAY_demo2">
                            @include('Index._topic_list', ['topics' => $topics])
                            {!! $topics->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
                    {{-- 算法逻辑:系统每一个小时计算一次，统计最近7天所有用户发的 帖子数 和 评论数，
                    用户每发一个帖子则得 4 分，每发一个回复得 1 分，计算出所有人的『得分』后再倒序，
                    排名前八的用户将会显示在「活跃用户」列表里。
                    假设用户 A 在 7 天内发了 10 篇帖子，发了 5 条评论，则其得分为
                    10 * 4 + 5 * 1 = 45--}}
                    <div class="popular-info">

                        {{--<div class="card ">--}}
                            {{--<div class="card-body">--}}
                                {{--<a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align">--}}
                                    {{--<i class="fas fa-pencil-alt mr-2"></i> 新建帖子--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="layui-card">
                            <div class="layui-card-header" style="border-bottom: 1px solid #eaeaea;">
                                <h3>技术知识社区</h3>

                            </div>
                            <div class="layui-card-body">
                                <ul class="list-box">
                                    <div class="card ">
                                        <div class="card-body" style="color: #f4645f;">
                                            <p>只有有效地继承人类知识，同时把世界最先进的科学技术知识拿到手，我们再向前迈出半步，就是最先进的水平，第一流的科学家。<br>
                                                <span  style="margin-left: 150px"></span>——温伯格
                                            </p>
                                            <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align" style="background-color: #fff;border: 1px solid #f4645f">
                                                <i class="fas fa-pencil-alt mr-2"></i> <span style="color: #f4645f;">新建帖子</span>
                                            </a>
                                        </div>
                                    </div>
                                    {{--//边缘用户--}}
                                    {{--@if (count($active_users))--}}
                                        {{--@foreach ($active_users as $active_user)--}}
                                            {{--<a class="media mt-2" href="{{ route('users.show', $active_user->id) }}">--}}
                                                {{--<div class="media-left media-middle mr-2 ml-1">--}}
                                                    {{--<img src="{{ $active_user->avatar }}" width="24px" height="24px" class="media-object" style="border-radius: 12px;">--}}
                                                {{--</div>--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<small class="media-heading text-secondary">{{ $active_user->name }}</small>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <h3>最热门</h3>
                            </div>

                            <div class="layui-card-body">
                                <ul class="list-box">
                                    {{--//边缘用户--}}
                                    @foreach($right_order_article as $k=>$v)
                                        <li class="list">
                                            <a href="{{ route('topics.show', $v->id) }}">{{$v['title']}}</a><i class="heat-icon"></i>
                                        </li>
                                    @endforeach
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