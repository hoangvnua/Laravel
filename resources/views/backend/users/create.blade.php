@extends('backend.layouts.master')

@section('title')
    Thêm mới người dùng
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tạo mới người dùng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('backend.users.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Họ tên</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="Họ tên">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar">
                            <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputFile">Ngày sinh</label>
                    <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                        </div>
                        <input type="date" class="form-control" name="ngaysinh" data-target="#reservationdate">
                    </div>
                </div> --}}
                <div class="form-group">
                    <label for="exampleInputFile">Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Mật khẩu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Nhập lại mật khẩu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password_confirm"
                            placeholder="Nhập lại mật khẩu">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Số điện thoại</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Địa chỉ</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="roles[]" aria-placeholder="1" aria-valuenow="1">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thêm User</button>

            </form>
        </div>
    </div>
@endsection
