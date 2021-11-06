@extends('auth.master')

@section('title')
    Login
@endsection

@section('content')

    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <div class="form-group first">
            <label for="username">Email</label>
            <input type="text" class="form-control" id="username" name="email">

        </div>
        <div class="form-group last mb-4">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex mb-5 align-items-center">
            <label class="control control--checkbox mb-0">
                <span class="caption">
                    Nhớ tôi
                </span>
                <input type="checkbox" checked="checked" name="remember" />
                <div class="control__indicator"></div>
            </label>
            <span class="ml-auto">
                <a href="#" class="forgot-pass" style="font-size: 15px;">
                    Quên mật khẩu
                </a>
            </span>
        </div>

        <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">

        <div style="margin-top: 5px">Chưa có tài khoản
            <a href="{{ route('auth.register') }}" class="register">
                Đăng ký ngay
            </a>
        </div>

        <span class="d-block text-center my-4 text-muted">&mdash; Hoặc đăng nhập với
            &mdash;</span>

        <div class="social-login" style="text-align: center">
            <a href="#" class="facebook">
                <span class="icon-facebook mr-3"></span>
            </a>
            <a href="#" class="google">
                <span class="icon-google mr-3"></span>
            </a>
        </div>
    </form>

@endsection
