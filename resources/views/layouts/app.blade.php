<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '微新闻') - 资讯博客</title>
    <meta name="description" content="@yield('description', '资讯博客 社区')" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('default/layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('default/static/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="micronews micronews-login ">

@include('layouts._header')
@include('layouts._message')
@yield('content')
@include('layouts._footer')


<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    layui.config({
        base: '/default/static/js/'
    }).use('index',function(){
        var index = layui.index;
        index.seachBtn()
        index.login()
        index.arrowutil()
    });
</script>
</body>
</html>