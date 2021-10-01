@extends('backend.layouts.master')

@section('title')
  Create Category Post
@endsection

@section('content-header')
    <h1>Thêm mới danh mục</h1>
@endsection

@section('content')

<div class="card card-primary">
    <form class="form-horizontal" method="POST" action="{{ route('backend.categories.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên danh mục</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
        </div>
        

      <div class="row">
        <div class="col-sm-12">
          <!-- select -->
          <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
            </select>
          </div>
        </div>
      </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="float: right">Tạo mới</button>
      </div>
    </form>
  </div>
@endsection