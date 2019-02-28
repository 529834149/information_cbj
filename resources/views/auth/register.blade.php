@extends('layouts.app')

@section('content')
    <div class="micronews-login-container">
        <div class="form-box">
            <h3>新用户<b>注册</b></h3>
            <div class="wrap">
                <form class="layui-form form-horizontal" method="POST" action="{{ route('register') }}"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="phone" lay-verify="required|phone" value="{{ old('phone') }}" id="phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text"  name="captcha" lay-verify="required" id="imgCode" placeholder="验证码" autocomplete="off" class="layui-input">
                            <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                            @if ($errors->has('captcha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('captcha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text"  name="code" lay-verify="required" placeholder="请输入短信验证码" autocomplete="off" class="layui-input">
                            <input type="button"  id="veriCodeBtn" name="sendCode" value="验证码" class="obtain layui-btn">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="password" lay-verify="required|phone" value="{{ old('password') }}" id="phone" placeholder="请设置用户名密码" autocomplete="off" class="layui-input">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="q_password" lay-verify="required|phone" value="{{ old('q_password') }}" id="phone" placeholder="请重复用户名密码" autocomplete="off" class="layui-input">
                            @if ($errors->has('q_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('q_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="layui-form-item agreement">
                        <div class="layui-input-block">
                            <input type="checkbox" name="like1[write]" lay-verify="required" lay-skin="primary" title="我已阅读并同意" checked="">
                            <span class="txt"><a href="#">用户协议</a>和<a  href="#">隐私条款</a></span>

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="*" onclick="return false">登录</button>
                        </div>
                    </div>
                    <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
                </form>
                <div class="other-login">
                    <a href="#">
                        <img src="{{ asset('/layui/res/static/images/load1.png') }}">
                    </a>
                    <a href="#">
                        <img src="{{ asset('/layui/res/static/images/load2.png') }}">
                    </a>
                </div>
            </div>



        </div>
    </div>

    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

@endsection
