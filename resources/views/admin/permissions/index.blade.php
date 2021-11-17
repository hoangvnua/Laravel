@extends('admin.layouts.master')

@section('title')
    Quyền
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
                            <li class="breadcrumb-item"><a href="#">Quản lý chung</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quyền</li>
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
                        <th scope="col">Quyền</th>
                        <th scope="col">Mã quyền</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->name }}</th>
                            <th>
                                {{ $permission->slug }}
                            </th>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endsection
