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
                    <div class="popular-info">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <h3>最热门</h3>
                            </div>

                            <div class="layui-card-body">
                                <ul class="list-box">
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