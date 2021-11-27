@extends('admin.layouts.master')

@section('title')
    Người dùng
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Quản lý người dùng</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý người dùng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')


        <div class="pd-20">
            @can('create-post', App\models\Post::class)
                @include('backend.component.btn', [
                'href' => route('backend.users.create'),
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
        </div>


        <div class="min-height-200px">
            <div class="row clearfix">
                @foreach ($users as $user)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="da-card">
                            <div class="da-card-photo">
                                <img src="{{ $user->image }}" alt="" style="height: 210px">
                                <div class="da-overlay">
                                    <div class="da-social">
                                        <ul class="clearfix">
                                            <li><a href="{{ route('backend.users.show', $user->id) }}"><i
                                                        class="fas fa-eye"></i></a>
                                            </li>
                                            <li><a href="{{ route('backend.users.edit', $user->id) }}"><i
                                                        class="far fa-edit"></i></a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="da-card-content">
                                <div>
                                    <h5 class="h5 mb-10">{{ $user->name }}</h5>
                                    <p class="mb-0" style="display: ">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </p>
                                </div>
                                <div style="justify-content: center;display: flex">
                                    <form method="POST" action="{{ route('backend.users.login', $user->id) }}">
                                        @csrf
                                        <button class="btn btn-outline-success">
                                            <i class="fas fa-user"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#exampleModal-{{ $user->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bạn có
                                                        chắc
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
                                                        action="{{ route('backend.users.destroy', $user->id) }}">
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
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{ $users->links() }}
    </div>

@endsection
