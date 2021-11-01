@extends('backend.layouts.master')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
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
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('create-post', App\models\Post::class)
                            @include('backend.component.btn', [
                            'href' => route('backend.posts.create'),
                            'type' => 'primary',
                            'content' => 'Thêm mới'
                            ])
                        @endcan

                        <form method="GET" action="{{ route('backend.posts.index') }}" style="float: right">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên bài viết</th>
                                    <th>Thẻ</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Người tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Tên danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <a href="{{ route('frontend.posts.show' , $post->id) }}" style="color: black; font-weight: bold">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-info">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (!empty($post->image))
                                                <img src="{{ Storage::disk($post->disk)->url($post->image) }}"
                                                    width="100px">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $post->user->name }}
                                        </td>
                                        <td>
                                            {!! $post->status_text !!}
                                        </td>
                                        <td>
                                            {{ $post->category->name }}
                                        </td>
                                        <td style="display: flex">
                                            @can('update-post', $post)
                                                <a href='{{ route('backend.posts.edit', $post->id) }}'>
                                                    <i class="far fa-edit btn btn-outline-primary"></i>
                                                </a>
                                            @endcan
                                            &ensp;
                                            @can('delete-post', $post)
                                                <form method="POST" action="{{ route('backend.posts.destroy', $post->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endcan

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
