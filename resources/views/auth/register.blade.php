@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Đăng kí</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Đăng kí</li>
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
            <h3>Register</h3>
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="default-form-box">
                    <label>Họ tên<span>*</span></label>
                    <input type="text" name="name">
                </div>
                <div class="default-form-box">
                    <label>Username or email <span>*</span></label>
                    <input type="email" name="email">
                </div>
                <div class="default-form-box">
                    <label>Passwords <span>*</span></label>
                    <input type="password" name="password">
                </div>
                <div class="default-form-box">
                    <label>Repasswords<span>*</span></label>
                    <input type="password" name="password_confirmation">
                </div>
                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng kí</button>
                    <label class="checkbox-default mb-4" for="offer">
                    </label>
                    <p style="display: flex">Đã có tài khoản<a href="#"><b>Đăng nhập</b></a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
