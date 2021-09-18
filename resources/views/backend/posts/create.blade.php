@extends('backend.layouts.master')

@section('title')
  Create Post
@endsection

@section('content-header')
    <h1>Tạo bài viết</h1>
@endsection

@section('content')

<div class="card card-primary">
    <form class="form-horizontal" method="POST" action="{{ route('backend.posts.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tiêu đề</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Textarea</label>
          @include('backend.component.summernote')
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
        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
      </div>
    </form>
  </div>
@endsection

@section('class')
    active
@endsection