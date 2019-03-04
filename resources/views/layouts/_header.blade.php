<div class="micronews-header-wrap">
    <div class="micronews-header w1000 layui-clear">
        <h1 class="logo">
            <a href="/">
                <img src="{{ asset('default/static/images/LOGO.png') }}" alt="logo">
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
            @guest
            <a href="{{ route('login') }}">
                登录
            </a>
            <a href="{{ route('register') }}">
                注册
            </a>
            @else
                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    {{--<ul class="navbar-nav navbar-right">--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">--}}
                                {{--{{ Auth::user()->name }}--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                {{--<a class="dropdown-item" href="">个人中心</a>--}}
                                {{--<a class="dropdown-item" href="">编辑资料</a>--}}
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a class="dropdown-item" id="logout" href="#">--}}
                                    {{--<form action="{{ route('logout') }}" method="POST">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--<button class="btn btn-block btn-danger" type="submit" name="button">退出</button>--}}
                                    {{--</form>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px" style="    margin-top: 20px;">
                </a>
                <a href="{{ route('login') }}" >
                    <span style="color: red;position: relative;bottom: 10px;">{{ Auth::user()->name }}</span>
                </a>
            @endguest
            <!-- <a href="login.html"> -->
            <!-- <img src="../res/static/images/header.png" style="width: 36px; height: 36px;"> -->
            <!-- </a> -->
        </div>
        <div class="menu-icon">
            <i class="layui-icon layui-icon-more-vertical"></i>
        </div>
        <div class="mobile-nav">
            <ul class="layui-nav" lay-filter="">
                <li class="layui-nav-item layui-this"><a href="index.html">最新</a></li>
                <li class="layui-nav-item"><a href="list.html">娱乐</a></li>
                <li class="layui-nav-item"><a href="list.html">生活</a></li>
                <li class="layui-nav-item"><a href="list.html">财经</a></li>
                <li class="layui-nav-item"><a href="list.html">科技</a></li>
                <li class="layui-nav-item"><a href="list.html">军事</a></li>
            </ul>
        </div>
    </div>
</div>