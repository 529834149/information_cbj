<a href="#"><img class="media-object img-thumbnail mr-3" src="{{ $topic->user->avatar }}" width="48" height="48"></a>
<form class="layui-form" action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" onSubmit="return beforeSubmit(this);">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <div class="layui-form-item layui-form-text">
        <div class="layui-input-block">
            <textarea id="onInput"  placeholder="请输入内容" class="layui-textarea" name="content"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block" style="text-align: right;">
            <div class="message-text">
                <div class="txt">

                </div>
            </div>
            <button type="submit" class="layui-btn micronews-details-Publish">发表</button>
        </div>
    </div>
</form>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('default/js/jquery.min.js') }}"></script>
<script id="">
    function beforeSubmit (form){
        if(form.content.value==''){
            $('.message-text .txt').text('请填写内容');
            return false;
        }else{
            return
        }
    }
</script>