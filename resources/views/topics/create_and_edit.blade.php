@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('default/editor/css/simditor.css') }}">

<div class="container">
    <div class="col-md-10 col-md-offset-1" style="margin-top: 25px;">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    文章 /
                    @if($topic->id)
                        修改 #{{$topic->id}}
                    @else
                        发布
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
                </div>
                <div class="form-group">
                    <select class="form-control" name="category_id" required>
                        <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">发布</button><small style="margin-left: 30px;">!请谨慎发帖</small>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('default/editor/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('default/layui/layui.js') }}"></script>
<script src="{{ asset('default/editor/js/module.js') }}"></script>
<script src="{{ asset('default/editor/js/hotkeys.js') }}"></script>
<script src="{{ asset('default/editor/js/uploader.js') }}"></script>
<script src="{{ asset('default/editor/js/simditor.js') }}"></script>

<script>
    $(document).ready(function() {
        var editor = new Simditor({
            textarea: $('#editor'),
            upload: {
                url: '{{ route('topics.upload_image') }}',
                params: {
                    _token: '{{ csrf_token() }}'
                },
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage: true,
        });
    });
</script>
@endsection