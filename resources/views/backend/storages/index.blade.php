@extends('backend.layouts.master')

@section('title')
    List Tags
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Hình ảnh</li>
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
                        'href' => route('backend.categories.create'),
                        'type' => 'success',
                        'content' => 'Tạo mới danh mục'
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
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paths as $key => $path)
                                    <tr>
                                        <td>
                                            <img src="{{ $path }}" alt="" width="200px" height="200px">
                                        </td>
                                        <td style="display: flex">
                                            <a class="btn btn-outline-success"
                                                href="{{ route('backend.storages.show', $key) }}">
                                                <i class="fas fa-cloud-download-alt"></i>
                                            </a> &ensp;
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#exampleModal-{{ $key }}">
                                                <i class="far fa-trash-alt"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc
                                                                muốn xóa
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Sau khi xác nhận xẽ xóa vĩnh viễn và có thể không khôi phục lại
                                                            được
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form method="POST"
                                                                action="{{ route('backend.storages.destroy', $key) }}">
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

                                        </td>

                                        {{-- <td style="display: flex">
                                            <a href="{{ route('backend.categories.edit', $category->id) }}"
                                                class="btn btn-outline-info"><i class="far fa-edit"></i></a>
                                            <form method="POST"
                                                action="{{ route('backend.categories.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('backend.categories.show', $category->id) }}"
                                                class="btn btn-outline-warning"><i class="fas fa-info-circle"></i></a>
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
