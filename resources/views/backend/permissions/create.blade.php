@extends('backend.layouts.master')

@section('title')
    Create Permission
@endsection

@section('content-header')
    <h1>Creat new Permission</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.permissions.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Tên Permission">
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thêm Permission</button>

            </form>
        </div>
    </div>
@endsection
