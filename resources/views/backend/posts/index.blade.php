@extends('backend.layouts.master')

@section('content-header')
    <h1>Danh sách bài viết</h1>

@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @include('backend.component.btn', [
                        'href' => route('backend.posts.create'),
                        'type' => 'primary',
                        'content' => 'Thêm mới'
                        ])

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('backend.posts.index') }}" style="display: flex">
                        <div class="col-3">
                            <input type="text" class="form-control" name="title" placeholder="Lọc theo title">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="status" placeholder="Lọc theo Status">
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
                                    <th>Tên bài viết</th>
                                    <th>Nội dung</th>
                                    <th>Người tạo</th>
                                    <th>Người sửa đổi</th>
                                    <th>Status</th>
                                    <th>Tên danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            Title: {{ $post->title }} <br>
                                            Slug: {{ $post->slug }}
                                        </td>
                                        <td>{{ $post->content }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->userUpdate->name }}</td>
                                        <td>{!! $post->status_text !!} </td>
                                        <td>{{ $post->category->name }}</td>
                                        <td style="display: flex">

                                            <a href='{{ route('backend.posts.show', $post->id) }}'>
                                                <i class="far fa-eye btn btn-outline-success"></i>
                                            </a>
                                            <a href='{{ route('backend.posts.edit', $post->id) }}'>
                                                <i class="far fa-edit btn btn-outline-primary"></i>
                                            </a>
                                            <form method="POST" action="{{ route('backend.posts.destroy', $post->id) }}">
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
                        {{ $posts->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('class1')
    active
@endsection
