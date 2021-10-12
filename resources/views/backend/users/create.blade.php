@extends('backend.layouts.master')

@section('title')
    Create User
@endsection

@section('content-header')
    <h1>Creat new user</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.users.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Họ tên">
                </div>


                <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                    <input type="date" class="form-control" name="ngaysinh" data-target="#reservationdate">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Roles</label>
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
