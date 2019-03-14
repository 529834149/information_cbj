@extends('layouts.app')
@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')

    <div class="micronews-container micronews-details-container w1000">
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
                    <div class="main">
                        <div class="title">
                            <h3> {{ $topic->title }}</h3>
                            <div class="b-txt">
                                <span class="label">{{ $topic->category->name }}</span>
                                <span class="icon">
                                    <i class="layui-icon layui-icon-radio"></i>
                                    <b>{{ $topic->view_count }}</b>人
                                </span>
                                <span class="icon">
                                    <i class="layui-icon layui-icon-username"></i>
                                    <b>{{ $topic->user->name }}</b>
                                </span>
                                <a href="#message">
                                    <span class="icon message">
                                        <i class="layui-icon layui-icon-dialogue"></i>
                                        <b>{{$topic->reply_count}}</b>条
                                    </span>
                                </a>
                                <span class="icon time">
                                    <i class="layui-icon layui-icon-log"></i>
                                    {{ $topic->updated_at->diffForHumans() }}
                                </span>
                                @can('update', $topic)
                                    <div class="operate">
                                        <hr>
                                        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
                                            <i class="far fa-edit"></i> 编辑
                                        </a>
                                        <form action="{{ route('topics.destroy', $topic->id) }}" method="post"
                                              style="display: inline-block;"
                                              onsubmit="return confirm('您确定要删除吗？');">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                                <i class="far fa-trash-alt"></i> 删除
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="article">
                            <p class="source">作者：
                                <span>{{ $topic->user->name }}</span></p>
                            <p class="original-tit mt30">原标题：
                                <span> {{ $topic->title }}</span>
                            </p>

                            <blockquote class="code">{{ $topic->excerpt }}</blockquote>
                            <p class="topic-body">
                                {!! $topic->body !!}
                            </p>

                            <div class="share-title">
                                <span class="txt">分享:</span>
                                <a href="#">
                                    <i class="icon layui-icon layui-icon-login-wechat"></i>
                                </a>
                                <a href="#">
                                    <i class="icon layui-icon layui-icon-login-weibo"></i>
                                </a>
                                <a href="#">
                                    <i class="icon layui-icon layui-icon-login-qq"></i>
                                </a>
                                <button class="layui-btn Collection">❤
                                    <span>已收藏</span></button>
                            </div>
                        </div>

                        <div class="leave-message" id="message">
                            <div class="tit-box">
                                <span class="tit">网友跟帖</span>
                                <span class="num">
                                <b>{{$topic->reply_count}}</b>条</span>
                            </div>
                            <div class="content-box">
                                <div class="tear-box">
                                    @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])

                                </div>
                                {{--<a href="#"><img src="{{ $topic->user->avatar }}"></a>--}}
                                {{--<div class="tear-box">--}}
                                    {{--<a href="#">--}}
                                        {{--@includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                <div class="card topic-reply mt-4">
                                    <div class="card-body">
                                        @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .topic-reply {
                    a {
                        color: inherit;
                    }

                    .meta {
                        font-size: .9em;
                        color: #b3b3b3;
                    }
                    }
                </style>
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
                    <div class="popular-info popular-info-tog">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <h3>资讯推荐</h3></div>
                            <div class="layui-card-body">
                                <ul class="list-box">

                                    <a href="details.html">
                                        <img src="{{ asset('default/static/images/news_img15.jpg') }}" width="100%">
                                    </a>
                                    热门资讯
                                    @foreach($right_order_article as $v)
                                        <li class="list">
                                            <a href="{{ route('topics.show', $v->id) }}">{{$v['title']}}</a>
                                        </li>
                                    @endforeach

                                    {{--<li class="list">--}}
                                        {{--<a href="#">中流击水 奋楫者进_中共十九大</a></li>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">你好！新时代_2018全国两会</a></li>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">“日销40万”外卖料包厂被曝光，制作过程令人作呕</a></li>--}}
                                    {{--<a href="details.html">--}}
                                        {{--<img src="{{ asset('default/static/images/news_img16.jpg') }}" width="100%"></a>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">韩国送的200吨橘子该怎么分？</a></li>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">中流击水 奋楫者进_中共十九大</a></li>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">你好！新时代_2018全国两会</a></li>--}}
                                    {{--<li class="list">--}}
                                        {{--<a href="#">“日销40万”外卖料包厂被曝光，制作过程令人作呕</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .article img{
            max-width:100%;
        }
        .simditor-body, .topic-body {
            font-size: 15px;
            line-height: 1.3;
            overflow: hidden;
            line-height: 1.6;
            word-wrap: break-word;
        }
        .code{
            word-wrap: normal;
            /*padding: 14px;*/
            /*overflow: auto;*/
            /*line-height: 1.45;*/
            background-color: #f5f8fc;
            color: #8796a8;
            font-size: 15px;
            /*border-radius: 3px;*/
            /*color: inherit;*/
            /*border: none;*/

        }
    </style>
    <script type="text/javascript" src="{{ asset('default/layui/layui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.min.js') }}"></script>
    <script>
        layui.config({
            base: '/default/static/js/'
        }).use('index',function(){
            var index = layui.index,$ = layui.$;
            index.EnterMessage()
            index.Page('micronews-details-test',50)
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
            index.onInput()
            index.arrowutil()
        });
    </script>

@endsection
