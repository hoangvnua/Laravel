@extends('backend.layouts.master')

@section('title')
    Chỉnh sửa thông tin người dùng
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chỉnh sửa thông tin người dùng</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.users.update', $user->id) }}">
                @method('PUT')
                @csrf

                <label for="exampleInputFile">Họ tên</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ $user->name }}">
                </div>

                <label for="exampleInputFile">Ngày sinh</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                    <input type="date" class="form-control" name="ngaysinh" data-target="#reservationdate"
                        value="{{ $user->updated_at }}">

                </div>

                <label for="exampleInputFile">Email</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        value="{{ $user->email }}">
                </div>

                <label for="exampleInputFile">Mật khẩu</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                </div>

                <label for="exampleInputFile">Số điện thoại</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="number" class="form-control" name="phone" placeholder="Số điện thoại"
                        value="{{ $user->UserInfo->phone }}">
                </div>

                <label for="exampleInputFile">Địa chỉ</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                        value="{{ $user->UserInfo->address }}">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="roles[]" aria-placeholder="1" aria-valuenow="1">
                                @foreach ($roles as $role)
                                    @foreach ($user->roles as $user_role)
                                        @php
                                            $selected = '';
                                            if ($user_role->id == $role->id) {
                                                $selected = 'selected';
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                    <option value="{{ $role->id }}" @if (isset($selected)) {{ $selected }} @endif>{{ $role->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary" style="float: right">Cập nhật</button>

            </form>
        </div>
    </div>
@endsection
