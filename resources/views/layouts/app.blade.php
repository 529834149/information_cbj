<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微新闻</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/layui/res/layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/layui/res/static/css/main.css') }}">
</head>
<body class="micronews micronews-login">
<div class="micronews-header-wrap">
    @include('layouts._header')
</div>
@yield('content')
@yield('footer')
    {{--@include('layouts._footer')--}}

<script type="text/javascript" src="{{ asset('/layui/res/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/layui/layui.all.js') }}"></script>
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<script>
    layui.config({
        base: '/layui/res/static/js/'
    }).use('index',function(){
        var index = layui.index;
        index.seachBtn()
        index.login()
        index.arrowutil()
    });
</script>
</body>
</html>