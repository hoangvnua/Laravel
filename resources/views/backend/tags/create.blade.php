@extends('backend.layouts.master')

@section('title')
    Create Tags
@endsection

@section('content-header')
    <h1>Creat new Tags</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.tags.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Tên tag">
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thêm Tag</button>

            </form>
        </div>
    </div>
@endsection