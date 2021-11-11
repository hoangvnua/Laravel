@extends('admin.layouts.master')

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Quản lý bài viết</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            January 2018
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    @endsection

    @section('content')

        <div class="card-box mb-30">
            <div class="pd-20">
                @can('create-post', App\models\Post::class)
                    @include('backend.component.btn', [
                    'href' => route('backend.posts.create'),
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
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Tên bài viết</th>
                            <th>Thẻ</th>
                            <th>Ảnh đại diện</th>
                            <th>Người tạo</th>
                            <th>Trạng thái</th>
                            <th>Tên danh mục</th>
                            <th class="datatable-nosort">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="table-plus">
                                    <a href="{{ route('frontend.posts.show', $post->id) }}"
                                        style="color: black; font-weight: bold">
                                        {{ $post->title }}
                                    </a>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <img src="{{ Storage::disk($post->disk)->url($post->image) ?? '' }}" width="100px"
                                        style="height: 100px">
                                </td>
                                <td>
                                    {{ $post->user->name ?? '' }}
                                </td>
                                <td>
                                    {!! $post->status_text ?? '' !!}
                                </td>
                                <td>
                                    {{ $post->category->name ?? '' }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item"
                                                href="{{ route('frontend.posts.show', $post->id) }}"><i
                                                    class="dw dw-eye"></i> Xem bài viết</a>
                                            @can('update-post', $post)
                                                <a class="dropdown-item" href='{{ route('backend.posts.edit', $post->id) }}'>
                                                    <i class="dw dw-edit2"> Chỉnh sửa</i>
                                                </a>
                                            @endcan
                                            @can('delete-post', $post)
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $post->id }}">
                                                    <i class="dw dw-delete-3"></i>Xóa bài viết
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1"
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
                                                                    action="{{ route('backend.posts.destroy', $post->id) }}">
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
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
