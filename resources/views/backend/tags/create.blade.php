@extends('backend.layouts.master')

@section('title')
    Thêm thẻ mới
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <h3>Tạo mới thẻ</h3>
            <form class="form-horizontal" method="POST" action="{{ route('backend.tags.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Tên thẻ">
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thêm thẻ</button>

            </form>
        </div>
    </div>
@endsection
