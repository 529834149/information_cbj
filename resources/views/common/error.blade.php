@if (count($errors) > 0)
    <div class="alert alert-danger">
        <h4>错误信息：</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li> <i class="layui-icon  layui-icon-tips"></i> {{ $error }}</li>

            @endforeach
        </ul>
    </div>
@endif