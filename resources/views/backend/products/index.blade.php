@extends('backend.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
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
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('create-post', App\models\Post::class)
                            @include('backend.component.btn', [
                            'href' => route('backend.products.create'),
                            'type' => 'primary',
                            'content' => 'Thêm mới'
                            ])
                        @endcan

                        <form method="GET" action="{{ route('backend.products.index') }}" style="float: right">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng còn lại</th>
                                    <th>Lượt xem</th>
                                    <th>Lượt mua</th>
                                    <th>Đánh giá</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                           
                                            <img src="{{ $product->img }}" width="100px">
                                        </td>
                                        <td>
                                            <a href="{{ route('frontend.shop.show', $product->id) }}"
                                                style="color: black; font-weight: bold">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $product->quatity }}
                                        </td>
                                        <td>
                                            {{ $product->view_count ?? '' }}
                                        </td>
                                        <td>
                                            {!! $product->sale_count ?? '' !!}
                                        </td>
                                        <td>
                                            {{ $product->category->name ?? '' }}
                                        </td>
                                        <td style="display: flex">
                                            @can('update-post', $product)
                                                <a href='{{ route('backend.products.edit', $product->id) }}'>
                                                    <i class="far fa-edit btn btn-outline-primary"></i>
                                                </a>
                                            @endcan
                                            &ensp;
                                            @can('delete-post', $product)
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $product->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $product->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc
                                                                    muốn xóa
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Sau khi xác nhận xẽ xóa vĩnh viễn và có thể không khôi phục lại
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

                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
