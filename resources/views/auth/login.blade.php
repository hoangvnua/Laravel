@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Đăng nhập</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('frontend.posts.index') }}">Trang chủ</a></li>
                                    <li class="active" aria-current="page">Đặng nhập</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-6 col-md-6" style="margin: 20%; width: 60%;">
        <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0"
            style="border: 2px solid black; border-radius: 10px; padding: 5px;">
            <h3>Đăng nhập</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="default-form-box">
                    <label>Email <span>*</span></label>
                    <input type="email" name="email">
                </div>
                <div class="default-form-box">
                    <label>Mật khẩu <span>*</span></label>
                    <input type="password" name="password">
                </div>
                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng nhập</button>
                    <label class="checkbox-default mb-4" for="offer">
                        <input type="checkbox" id="offer" name="remember" value="true">
                        <span>Nhớ tôi</span>
                    </label>
                    <a href="#">Quên mật khẩu?</a>
                    <p style="display: flex">Chưa có tài khoản&ensp;<a href="{{ route('auth.register') }}">Đăng kí!</a></p>

                </div>
            </form>
        </div>
    </div>
@endsection
