@extends('admin.layouts.master')

@section('title')
    Tạo mới danh mục
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Tạo mới danh mục</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Quản lý chung</a></li>
                            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tạo mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form method="POST" action="{{ route('backend.categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input class="form-control" type="text" placeholder="Nhập tên danh mục" name="name">
                </div>

                <div style="text-align: right">
                    <button class="btn btn-success">Tạo mới</button>
                </div>
            </form>
        </div>
    @endsection
