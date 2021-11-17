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
                        <h4>Quản lý bài viết</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')

        <div class="card-box mb-30">
            <div class="pd-20">
                @can('create-post', App\models\Post::class)
                    @include('backend.component.btn', [
                    'href' => route('backend.posts.create'),
                    'type' => 'primary',
                    'content' => 'Thêm mới'
                    ])
                @endcan
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="blog-wrap">
                <div class="container pd-0">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="blog-list">
                                <ul>
                                    @foreach ($posts as $post)
                                        <li>
                                            <div class="row no-gutters">
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="blog-img">
                                                        <img src="/admin/vendors/images/img2.jpg" alt=""
                                                            class="bg_img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-12 col-sm-12">
                                                    <div class="blog-caption">
                                                        <h4><a href="#">{{ $post->title }}</a></h4>
                                                        <div class="blog-by">
                                                            <p>
                                                                {{ $post->content }}
                                                            </p>
                                                            <div class="pt-10">
                                                                <a href="{{ route('backend.posts.show', $post->id) }}"
                                                                    class="btn btn-outline-primary"><i
                                                                        class="fas fa-eye"></i>
                                                                </a>
                                                                @can('update-post', $post)
                                                                    <a href="{{ route('backend.posts.edit', $post->id) }}"
                                                                        class="btn btn-outline-success"><i
                                                                            class="far fa-edit"></i>
                                                                    </a>
                                                                @endcan

                                                                @can('delete-post', $post)
                                                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                                                        data-target="#exampleModal-{{ $post->id }}">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade"
                                                                        id="exampleModal-{{ $post->id }}" tabindex="-1"
                                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">Bạn có chắc
                                                                                        muốn xóa
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Sau khi xác nhận xẽ xóa vĩnh viễn và có
                                                                                    thể không khôi phục lại
                                                                                    được
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <form method="POST"
                                                                                        action="{{ route('backend.posts.destroy', $post->id) }}">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button class="btn btn-danger">
                                                                                            Xác nhận xóa
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{ $posts->links() }}
                            {{-- <div class="blog-pagination">
                                <div class="btn-toolbar justify-content-center mb-15">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary prev"><i
                                                class="fa fa-angle-double-left"></i></a>
                                        <a href="#" class="btn btn-outline-primary">1</a>
                                        <a href="#" class="btn btn-outline-primary">2</a>
                                        <span class="btn btn-primary current">3</span>
                                        <a href="#" class="btn btn-outline-primary">4</a>
                                        <a href="#" class="btn btn-outline-primary">5</a>
                                        <a href="#" class="btn btn-outline-primary next"><i
                                                class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card-box mb-30">
                                <h5 class="pd-20 h5 mb-0">Danh mục</h5>
                                <div class="list-group">
                                    @foreach ($categories as $category)
                                        <a href="#"
                                            class="list-group-item d-flex align-items-center justify-content-between">
                                            {{ $category->name }}
                                            <span class="badge badge-primary badge-pill">7</span>
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
