@if (count($topics))
    @foreach ($topics as $topic)

    <div class="ulCommentList" >
        <div class="liCont" >
            <div class="item" >
                <div class="item-info">
                    <h4>
                        <a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a>
                    </h4>
                    <div class="b-txt">
                        <span class="label">{{ $topic->category->name }}</span>
                        <span class="icon message">
                            <i class="layui-icon layui-icon-dialogue"></i> {{ $topic->reply_count }}条</span>
                        <span class="icon time">
                            <i class="layui-icon layui-icon-log"></i> {{ $topic->created_at->diffForHumans() }}
                        </span>
                        <span>
                            @can('update', $topic)
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
                            @endcan
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
