@if (count($replies))
    @foreach ($replies as $reply)
        <div class="liCont">
            <div class="item">
                <div class="item-info">
                    <h4><a href="{{ route('topics.show', $reply->topic->id) }}"> {{ $reply->topic->title }}</a></h4>
                    <div class="b-txt">
                        <span class="icon message">
                              <i class="layui-icon layui-icon-dialogue"></i>
                              {{ $reply->topic->view_count }}条
                            </span>
                        <span class="icon time">
                              <i class="layui-icon layui-icon-log"></i>
                             {{ $reply->topic->created_at }}
                            </span>
                    </div>
                </div>
            </div>
            <a href="#"><img src="{{ $user->avatar }}"></a>
            <div class="item-cont">
                <div class="cont">
                    <p><span class="time">回复于 {{ $reply->created_at->diffForHumans() }}</span></p>
                    <p class="text"> {!! $reply->content !!}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
{{-- 分页 --}}
<div class="mt-4 pt-1" style="text-align: center;">
    {!! $replies->appends(Request::except('page'))->render() !!}
</div>

