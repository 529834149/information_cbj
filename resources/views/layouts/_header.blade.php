<div class="micronews-header w1000 layui-clear">
    <h1 class="logo">
        <a href="/">
            <img src="{{ asset('/layui/res/static/images/LOGO.png') }}" alt="logo">
            <span class="layui-hide">LOGO</span>
        </a>
    </h1>
    <p class="nav">
        <a href="/" class="active">最新</a>
        <a href="list.html">娱乐</a>
        <a href="list.html">生活</a>
        <a href="list.html">财经</a>
        <a href="list.html">科技</a>
        <a href="list.html">军事</a>
    </p>
    <div class="search-bar">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="text" name="title"  placeholder="搜索你要的内容" autocomplete="off" class="layui-input">
                    <button class="layui-btn search-btn"  formnovalidate><i class="layui-icon layui-icon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="login">
        <a href="/login">
            登录
        </a>
        {{--<a href="/register">--}}
            {{--注册--}}
        {{--</a>--}}
        <!-- <a href="login.html"> -->
        <!-- <img src="../res/static/images/header.png" style="width: 36px; height: 36px;"> -->
        <!-- </a> -->
    </div>
    <div class="menu-icon">
        <i class="layui-icon layui-icon-more-vertical"></i>
    </div>
    <div class="mobile-nav">
        <ul class="layui-nav" lay-filter="">
            <li class="layui-nav-item layui-this"><a href="/">最新</a></li>
            <li class="layui-nav-item"><a href="list.html">娱乐</a></li>
            <li class="layui-nav-item"><a href="list.html">生活</a></li>
            <li class="layui-nav-item"><a href="list.html">财经</a></li>
            <li class="layui-nav-item"><a href="list.html">科技</a></li>
            <li class="layui-nav-item"><a href="list.html">军事</a></li>
        </ul>
    </div>
</div>
</div>