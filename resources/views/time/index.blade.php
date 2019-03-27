@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('default/time/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('default/time/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('default/time/css/timeline.css') }}">
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <h2>时间轴纪</h2>
                    <div class="timeline timeline-line-dotted">
                        @foreach($data as $k=>$v)

                            <span class="timeline-label">
                                <span class="label label-primary">{{$v['date']}}</span>
                            </span>
                            <div class="timeline-item">
                                <div class="timeline-point timeline-point-success">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="timeline-event">
                                    <div class="timeline-heading">
                                        <h5>发现了<b style="font-size: 24px">{{$v['count']}}</b>篇</h5>
                                    </div>
                                    {{--<div class="timeline-body">--}}
                                        {{--<p>Money transfer. By Alex, Wallet ID: 1234567890, Amount: 10$</p>--}}
                                    {{--</div>--}}
                                    <div class="timeline-footer">
                                        <p class="text-right"><a href="time/{{$v['date']}}">查看更多</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<script type="text/javascript" src="{{ asset('default/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('default/jquery.min.js') }}"></script>
<script>
    $(function(){
        $("#times").addClass('active');
    })

</script>
@endsection