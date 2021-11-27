@extends('admin.layouts.master')

@section('title')
    Đơn hàng
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Đơn hàng</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý bán hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Thông tin người mua</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">
                                {{ $order->id }}
                            </th>
                            <td>
                                Tên: {{ $order->user->name }}
                                <br>
                                Số điện thoại: {{ $order->user->UserInfo->phone }} <br>
                                Địa chỉ: {{ $order->user->UserInfo->address }}
                            </td>
                            <td>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $order->order_products->count() }} sản phẩm
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse{{ $order->id }}" class="collapse"
                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($order->order_products as $od)
                                                    <div style="display: flex">
                                                        <a href="{{ route('frontend.shop.show', $od->product->id) }}">
                                                            <img src="{{ $od->product->img }}" alt=""
                                                                style="width: 150px; height: 100px;">
                                                        </a>
                                                        <div>
                                                            Tên sản phẩm: <a
                                                                href="{{ route('frontend.shop.show', $od->product->id) }}">
                                                                {{ $od->product->name }} <br>
                                                            </a>
                                                            Số lượng: {{ $od->so_luong }} <br>
                                                            Giá: {{ $od->price }}
                                                        </div>
                                                    </div>

                                                    <br>
                                                @endforeach
                                                <div style="text-align: right">
                                                    Tổng: {{ $order->total_format }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <form action="{{ route('backend.orders.update', $order->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5"
                                        name="status" onchange="form.submit()">
                                        <option value="{{ $order->status }}">{{ $order->status_text }}</option>
                                        <option value="1">Đóng gói</option>
                                        <option value="2">Vận chuyển</option>
                                        <option value="4">Vận chuyển thành công</option>
                                        <option value="3">Vận chuyển thất bại</option>
                                        <option value="5">Hủy đơn hàng</option>

                                    </select>
                                </form>

                            </td>

                            <th>
                                <a class="btn btn-outline-primary" href="{{ route('backend.orders.show', $order->id) }}">
                                    Xem chi tiết
                                </a>
                                <a class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal-{{ $order->id }}">
                                    Hủy đơn hàng
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hủy đơn hàng
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn hủy đơn
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form method="POST"
                                                    action="{{ route('backend.orders.destroy', $order->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        Xác nhận
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endsection
