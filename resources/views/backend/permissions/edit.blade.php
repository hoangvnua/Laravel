@extends('backend.layouts.master')

@section('title')
    Edit Permission
@endsection

@section('content-header')
    <h1>Edit Permission</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.permissions.update', $permission->id) }}">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thay đổi</button>

            </form>
        </div>
    </div>
@endsection
