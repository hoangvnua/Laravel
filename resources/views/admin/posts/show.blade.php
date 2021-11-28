@extends('admin.layouts.master')

@section('title')
    Bài viết
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4> {{ $post->title }}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')

        <div class="card-box mb-30">

            <div class="blog-wrap">
                <div class="container pd-0">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="blog-detail card-box overflow-hidden mb-30">
                                <div class="blog-img">
                                    <img src="{{ $post->img_url }}" alt="">
                                </div>
                                <div class="blog-caption">
                                    <h4 class="mb-10">{{ $post->title }}</h4>
                                    <p>{{ $post->content }}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card-box mb-30">
                                <h5 class="pd-20 h5 mb-0">Danh mục</h5>
                                <div class="list-group">
                                    @foreach ($categories as $category)
                                        <a href="#"
                                            class="list-group-item d-flex align-items-center justify-content-between">
                                            {{ $category->name }}
                                            <span
                                                class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-box mb-30">
                                <h5 class="pd-20 h5 mb-0">Latest Post</h5>
                                <div class="latest-post">
                                    <ul>
                                        <li>
                                            <h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a>
                                            </h4>
                                            <span>HTML</span>
                                        </li>
                                        <li>
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                                            </h4>
                                            <span>Css</span>
                                        </li>
                                        <li>
                                            <h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a>
                                            </h4>
                                            <span>jQuery</span>
                                        </li>
                                        <li>
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                                            </h4>
                                            <span>Bootstrap</span>
                                        </li>
                                        <li>
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                                            </h4>
                                            <span>Design</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-box overflow-hidden">
                                <h5 class="pd-20 h5 mb-0">Archives</h5>
                                <div class="list-group">
                                    <a href="#"
                                        class="list-group-item d-flex align-items-center justify-content-between">January
                                        2020</a>
                                    <a href="#"
                                        class="list-group-item d-flex align-items-center justify-content-between">February
                                        2020</a>
                                    <a href="#"
                                        class="list-group-item d-flex align-items-center justify-content-between">March
                                        2020</a>
                                    <a href="#"
                                        class="list-group-item d-flex align-items-center justify-content-between">April
                                        2020</a>
                                    <a href="#"
                                        class="list-group-item d-flex align-items-center justify-content-between">May
                                        2020</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
