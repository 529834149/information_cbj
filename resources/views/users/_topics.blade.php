@if (count($topics))
    @foreach ($topics as $topic)
    <div class="ulCommentList">
        <div class="liCont">
            <div class="item">
                <div class="item-info">
                    <h4>
                        <a href="details.html">{{ $topic->title }}</a>
                    </h4>
                    <div class="b-txt">
                        <span class="label">{{ $topic->category->name }}</span>
                        <span class="icon message">
                            <i class="layui-icon layui-icon-dialogue"></i> {{ $topic->reply_count }}条</span>
                        <span class="icon time">
                            <i class="layui-icon layui-icon-log"></i> {{ $topic->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
<div class="mt-4 pt-1" style="text-align: center;">
    {!! $topics->render() !!}
</div>
