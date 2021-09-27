@extends('backend.layouts.master')

@section('title')
  Edit Post
@endsection

@section('content-header')
    <h1>Chỉnh sửa bài viết</h1>
@endsection

@section('content')

<div class="card card-primary">
    <form class="form-horizontal" method="POST" action="{{ route('backend.posts.update',  $post->id) }}">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tiêu đề</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Textarea</label>
          @include('backend.component.summernote', [
            'content' => $post->content
          ])
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="text" name="status" class="form-control" id="exampleInputEmail1" value="{{ $post->status }}">
        </div>

      <div class="row">
        <div class="col-sm-6">
          <!-- select -->
          <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
          </div>
        </div>
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