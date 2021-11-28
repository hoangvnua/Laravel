@extends('admin.layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('style')
    i{
    width: 45px;
    }
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
        <div class="pd-20">
            @can('create-product', App\models\Product::class)
                @include('backend.component.btn', [
                'href' => route('backend.products.create'),
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
        <div class="product-wrap">
            <div class="product-list">
                <ul class="row">
                    @foreach ($products as $product)

                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-box">
                                <div class="producct-img"><img src="{{ $product->img }}" alt=""></div>
                                <div class="product-caption">
                                    <h4>
                                        <a
                                            href="{{ route('backend.products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="price">
                                        <del>{{ $product->price_format }}</del><ins>{{ $product->sale_price_format }}</ins>
                                    </div>
                                    <div style="text-align: center">
                                        @can('edit-product',App\models\Product::class)
                                            <a href="{{ route('backend.products.show', $product->id) }}"
                                                class="btn btn-outline-success"><i class="fas fa-eye"></i></a>
                                        @endcan
                                        @can('edit-product', App\models\Product::class)
                                            <a href="{{ route('backend.products.edit', $product->id) }}"
                                                class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        @endcan

                                        @can('delete-product', App\models\Product::class)
                                            <a class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#exampleModal-{{ $product->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        @endcan

                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc
                                                        muốn xóa
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sau khi xác nhận xẽ xóa vĩnh viễn và có
                                                    thể không khôi phục lại
                                                    được
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST"
                                                        action="{{ route('backend.products.destroy', $product->id) }}">
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
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            {{ $products->links() }}
        </div>
    @endsection
