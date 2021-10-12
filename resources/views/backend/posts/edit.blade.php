@extends('backend.layouts.master')

@section('title')
    Edit Post
@endsection

@section('content-header')
    <h1>Chỉnh sửa bài viết</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <form class="form-horizontal" method="POST" action="{{ route('backend.posts.update', $post->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                        value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Textarea</label>
                    @include('backend.component.summernote', [
                    'content' => $post->content
                    ])
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tag</label>
                            <select multiple="" class="form-control" name="tags[]">
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
                                    <option value="{{ $tag->id }}" @if (isset($selected)) {{ $selected }} @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                        <option value="{{ $post->status }}">{{ $post->status_text }}</option>
                        <option value="1">Public</option>
                        <option value="0">Draft</option>
                        <option value="2">Test</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="float: right">Lưu</button>
            </div>
        </form>
    </div>
@endsection

@section('class')
    active
@endsection
