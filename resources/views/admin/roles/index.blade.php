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
            @can('create-post', App\models\Post::class)
                @include('backend.component.btn', [
                'href' => route('backend.roles.create'),
                'type' => 'primary',
                'content' => 'Thêm mới'
                ])
            @endcan
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->name }}</th>
                            <th>
                                @foreach ($role->permissions as $permission)
                                    {{ $permission->name }} <br>
                                @endforeach
                            </th>
                            <th>
                                <a href="{{ route('backend.roles.edit', $role->id) }}" class="btn btn-outline-success"><i
                                        class="far fa-edit"></i>
                                </a>


                                <a class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal-{{ $role->id }}">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $role->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc
                                                    muốn xóa
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Sau khi xác nhận xẽ xóa vĩnh viễn và có
                                                thể không khôi phục lại
                                                được
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form method="POST"
                                                    action="{{ route('backend.roles.destroy', $role->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        Xác nhận xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endsection
