@extends('backend.layouts.master')

@section('title')
    List User
@endsection


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách Users</li>
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
                        @include('backend.component.btn', [
                        'href' => route('backend.users.create'),
                        'type' => 'primary',
                        'content' => 'Thêm mới'
                        ])

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
                    <form method="GET" action="{{ route('backend.users.index') }}" style="display: flex">
                        <div class="col-3">
                            <input type="text" class="form-control" name="name" placeholder="Lọc theo tên">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="email" placeholder="Lọc theo Email">
                        </div>
                        {{-- <div class="col-3">
                                <input type="text" class="form-control" placeholder=".col-5">
                            </div> --}}
                        <div class="col-3">
                            <button class="btn btn-info">Lọc</button>
                        </div>

                    </form>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Role</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->UserInfo->phone }}</td>
                                        <td>{{ $user->UserInfo->address }}</td>
                                        @foreach ($user->roles as $role)
                                            <td>{{ $role->name }}</td>
                                        @endforeach

                                        <td style="display: flex">
                                            <a href='{{ route('backend.users.show', $user->id) }}'>
                                                <i class="far fa-eye btn btn-outline-success"></i>
                                            </a>
                                            <a href='{{ route('backend.users.edit', $user->id) }}'>
                                                <i class="far fa-edit btn btn-outline-primary"></i>
                                            </a>
                                            <form method="POST" action="{{ route('backend.users.login', $user->id) }}">
                                                @csrf
                                                <button class="btn btn-outline-danger">
                                                    <i class="fas fa-user"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('backend.users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('class2')
    active
@endsection
