@extends('backend.layouts.master')

@section('title')
    Chỉnh sửa bài viết
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="card card-primary">
        <form class="form-horizontal" method="POST" action="{{ route('backend.posts.update', $post->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $post->title }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    @include('backend.component.summernote', [
                    'content' => $post->content
                    ])
                </div>

                <div class="form-group">
                    <label>Thẻ</label>
                    <div class="select2-purple">
                        <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Chọn thẻ"
                            style="width: 100%;">
                            @foreach ($tags as $tag)
                                    @foreach ($post->tags as $post_tag)
                                        @php
                                            $selected = '';
                                            if ($post_tag->id == $tag->id) {
                                                $selected = 'selected';
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                    <option value="{{ $tag->id }}" @if (isset($selected)) {{ $selected }} @endif>{{ $tag->name }}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                        <option value="{{ $post->status }}">{{ $post->status_text }}</option>
                        <option value="1">Done</option>
                        <option value="0">Draft</option>
                        <option value="2">Public</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="float: right">Lưu</button>
            </div>
        </form>
    </div>
@endsection
