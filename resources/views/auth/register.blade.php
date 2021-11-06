@extends('auth.master')

@section('title')
    Register
@endsection

@section('content')
    {{-- <div class="col-lg-6 col-md-6" style="margin: 20%; width: 60%;">
        <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0"
            style="border: 2px solid black; border-radius: 10px; padding: 5px;">
            <h3>Đăng kí</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="default-form-box">
                    <label>Họ tên<span>*</span></label>
                    <input type="text" name="name">
                </div>
                <div class="default-form-box">
                    <label>Email <span>*</span></label>
                    <input type="email" name="email">
                </div>
                <div class="default-form-box">
                    <label>Mật khẩu <span>*</span></label>
                    <input type="password" name="password">
                </div>
                <div class="default-form-box">
                    <label>Nhập lại mật khẩu<span>*</span></label>
                    <input type="password" name="password_confirmation">
                </div>
                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng kí</button>
                    <label class="checkbox-default mb-4" for="offer">
                    </label>
                    <p style="display: flex">Đã có tài khoản &ensp;<a href="{{ route('auth.login') }}"><b>Đăng nhập</b></a></p>
                </div>
            </form>
        </div>
    </div> --}}

    <form action="{{ route('auth.register') }}" method="post">
        @csrf
        <div class="form-group first">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group first">
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="email">
        </div>
        <div class="form-group last">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group last">
            <label for="password">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password_confirmation">
        </div>

        <div class="d-flex mb-5 align-items-center">
            <label class="control control--checkbox mb-0">
                <span class="caption">
                    Nhớ tôi
                </span>
                <input type="checkbox" checked="checked" name="remember" />
                <div class="control__indicator"></div>
            </label>

        </div>

        <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">

        <div style="margin-top: 5px">Đã có tài khoản
            <a href="{{ route('auth.login') }}" class="login">
                Đăng nhập ngay
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
