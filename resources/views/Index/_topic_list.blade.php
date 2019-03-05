@foreach($topics as $topic)
<div class="item">
    <div class="item-info">
        <h4><a href="{{ route('topics.show', $topic->id) }}">{{$topic->title}}</a></h4>
        <div class="b-txt">
            <span class="label">{{ $topic->category->name }}</span>
            <span class="icon message">
                <i class="layui-icon layui-icon-dialogue"></i>
                    {{$topic->reply_count}}条
            </span>
            <span class="icon time">
              <i class="layui-icon layui-icon-log"></i>
              {{ $topic->updated_at->diffForHumans() }}
            </span>
        </div>
    </div>
</div>
@endforeach