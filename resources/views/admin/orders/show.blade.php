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
                        <h4>Chi tiết đơn hàng</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý bán hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <h4>Thông tin khách hàng</h4>
            <table border="1" style="width: 50%;">
                <tr>
                    <th>Thông tin người đặt hàng</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Ngày đặt hàng đặt hàng</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td>{{ $order->user->UserInfo->phone }}</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>{{ $order->user->UserInfo->address }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $order->user->email }}</td>
                </tr>
            </table>
            <br>
            <table border="1" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->order_products as $od)
                        <tr style="text-align: center">
                            <td>
                                {{ $od->product_id }}
                            </td>
                            <td>
                                <img src="{{ $od->product->img }}" alt="" style="width: 150px; height: 100px;">
                            </td>
                            <td>
                                {{ $od->product->name }}
                            </td>
                            <td>
                                {{ $od->so_luong }}
                            </td>
                            <td>
                                {{ $od->price }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: right">
                Tổng đơn hàng: {{ $order->total_format }}
            </div> <br>
            <div>
                Trạng thái giao hàng: 
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
            </div>
        </div>
    @endsection
