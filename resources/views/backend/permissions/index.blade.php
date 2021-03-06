@extends('backend.layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách quyền</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @include('backend.component.btn', [
                        'href' => route('backend.permissions.create'),
                        'type' => 'primary',
                        'content' => 'Thêm mới'
                        ]) --}}


                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <form method="GET" action="{{ route('backend.permission.index') }}" style="display: flex">
                        <div class="col-3">
                            <input type="text" class="form-control" name="title" placeholder="Lọc theo title">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="status" placeholder="Lọc theo Status">
                        </div>
                        <div class="col-3">
                                <input type="text" class="form-control" placeholder=".col-5">
                            </div>
                        <div class="col-3">
                            <button class="btn btn-info">Lọc</button>
                        </div>
                    </form> --}}

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Quyền</th>
                                    <th>Slug</th>
                                    {{-- <th>Hành động</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->id }}
                                        </td>
                                        <td>
                                            {{ $permission->name }} <br>
                                        </td>
                                        <td>
                                            {{ $permission->slug }}
                                        </td>
                                        {{-- <td style="display: flex">

                                            <a href='{{ route('backend.permissions.show', $permission->id) }}'>
                                                <i class="far fa-eye btn btn-outline-success"></i>
                                            </a>
                                            <a href='{{ route('backend.permissions.edit', $permission->id) }}'>
                                                <i class="far fa-edit btn btn-outline-primary"></i>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('backend.permissions.destroy', $permission->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
