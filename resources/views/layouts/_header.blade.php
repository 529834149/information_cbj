<div class="micronews-header-wrap">
    <div class="micronews-header w1000 layui-clear">
        <h1 class="logo">
            <a href="/">
                <img src="{{ asset('default/static/images/LOGO.png') }}" alt="logo" width="66px" height="29.48">
                <span class="layui-hide">LOGO</span>
            </a>
        </h1>
        {{--<li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">话题</a></li>--}}
        {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>--}}
        {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}">教程</a></li>--}}
        {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>--}}
        {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>--}}

        <p class="nav">
            <a href="/" class="{{ active_class(if_route('/')) }}">首页</a>
            <a href="{{ route('categories.show', 1) }}" class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}" href="{{ route('categories.show', 1) }}">PHP</a>
            <a href="{{ route('categories.show', 2) }}" class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}">服务器</a>
            <a href="{{ route('categories.show', 3) }}" class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}">数据库</a>
            <a href="{{ route('categories.show', 4) }}" class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}">前端</a>
            {{--<a href="#">关于</a>--}}
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
                <a  class="infos nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'secondary' }} text-white" href="{{ route('notifications.index') }}">
                    {{ Auth::user()->notification_count }}
                </a>
                <style>
                    .badge-secondary {
                        background-color: #EBE8E8;
                    }

                    .badge-hint {
                        background-color: #d15b47 !important;;
                    }
                    .infos{
                        border-radius: 20px!important;
                        padding: 5px !important;
                        position: relative;
                        bottom: 10px;
                    }
                </style/>
                <a class="nav-link dropdown-toggle" href="/users/{{ Auth::user()->id }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle"  style="margin-top: 20px;width: 30px;height: 30px;">
                </a>

                <a class="dropdown-item" id="logout" href="#" style="position:relative;bottom: 10px;">
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                        {{ csrf_field() }}
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
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
                <li class="layui-nav-item layui-this"><a href="/">首页</a></li>
                <li class="layui-nav-item"><a href="{{ route('categories.show', 1) }}">PHP</a></li>
                <li class="layui-nav-item"><a href="{{ route('categories.show', 2) }}">服务器</a></li>
                <li class="layui-nav-item"><a href="{{ route('categories.show', 3) }}">数据库</a></li>
                <li class="layui-nav-item"><a href="{{ route('categories.show', 4) }}">前端</a></li>
                {{--<li class="layui-nav-item"><a href="list.html">军事</a></li>--}}
            </ul>
        </div>
    </div>
</div>