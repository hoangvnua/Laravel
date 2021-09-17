@extends('backend.layouts.master')

@section('content-header')
    <h1>Tạo bài viết</h1>
@endsection

@section('content')
    @include('backend.component.summernote')
    @include('backend.component.btnright', [
                    'href' => route('backend.posts.index'),
                    'type' => 'primary',
                    'content' => 'Thêm mới'
                ])
@endsection

@section('class')
    active
@endsection