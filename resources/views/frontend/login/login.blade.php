@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Login</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Login</li>
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
        <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0" style="border: 2px solid black; border-radius: 10px; padding: 5px;">
            <h3>login</h3>
            <form action="#" method="POST">
                <div class="default-form-box">
                    <label>Username or email <span>*</span></label>
                    <input type="email" name="email">
                </div>
                <div class="default-form-box">
                    <label>Passwords <span>*</span></label>
                    <input type="password">
                </div>
                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                    <label class="checkbox-default mb-4" for="offer">
                        <input type="checkbox" id="offer">
                        <span>Remember me</span>
                    </label>
                    <a href="#">Lost your password?</a>

                </div>
            </form>
        </div>
    </div>
@endsection
