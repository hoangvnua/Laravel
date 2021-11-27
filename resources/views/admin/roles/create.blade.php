@extends('admin.layouts.master')

@section('title')
    Vai trò
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Quyền</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Phân quyền</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vai trò</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form class="form-horizontal" method="POST" action="{{ route('backend.roles.store') }}">
                @csrf
                <label for="">Vai trò</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Tên chức vị">
                </div>

                <div class="form-group">
                    <label>Quyền hạn</label>
                    <select class="selectpicker form-control" data-size="5" name="permissions[]" multiple
                        data-actions-box="true" data-selected-text-format="count">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="text-align: right">
                    <button type="submit" class="btn btn-primary">Thêm vai trò</button>
                </div>

            </form>
        </div>
    @endsection
