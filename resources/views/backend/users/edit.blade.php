@extends('backend.layouts.master')

@section('title')
  Edit User
@endsection

@section('content-header')
  <h1>Edit user</h1>
@endsection

@section('content')
<div class="card card-info">
  <div class="card-body">
    <form class="form-horizontal" method="POST" action="{{ route('backend.users.update', $user->id) }}">
    @method('PUT')
      @csrf
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ $user->name }}">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
      </div>
      <input type="date" class="form-control" name="ngaysinh" data-target="#reservationdate" value="{{ $user->updated_at }}">
      
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
      </div>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
      </div>
      <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ">
    </div>

      <button type="submit" class="btn btn-primary" style="float: right">Cập nhật</button>

    </form>
  </div>
</div>
@endsection

@section('class4')
  active
@endsection