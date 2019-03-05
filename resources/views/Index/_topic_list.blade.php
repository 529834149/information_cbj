@if (count($topics))
    <div class="item">
        <div class="item-info">

            <div class="b-txt">
                <ul class="nav nav-pills">
                    <li class="{{ active_class( ! if_query('order', 'recent') ) }}"><a href="{{ Request::url() }}?order=default" >最后回复</a></li>
                    <li class="{{ active_class(if_query('order', 'recent')) }}"><a href="{{ Request::url() }}?order=recent" >最新发布</a></li>
                </ul>
            </div>
        </div>
    </div>
    @foreach($topics as $topic)
    <div class="item">
        <div class="item-info">
            <h4><a href="{{ route('topics.show', $topic->id) }}">{{$topic->title}}</a></h4>
            <div class="b-txt">
                <span class="label"><a href="{{ route('categories.show', $topic->category->id) }}">{{ $topic->category->name }}</a></span>
                <span class="icon message">
                    <i class="layui-icon layui-icon-dialogue"></i>
                    <a href="{{ route('topics.show', [$topic->id]) }}">
                        {{$topic->reply_count}}条
                    </a>
                </span>
                <span class="icon time">
                  <i class="layui-icon layui-icon-log"></i>
                  {{ $topic->updated_at->diffForHumans() }}
                </span>

                <span class="icon" style="position: relative;    margin-left: 22px;">
                    <i class="layui-icon layui-icon-friends"></i>
                 {{ $topic->user->name }}
                </span>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif