@extends('backend.layouts.master')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h1>ID bài viết: {{ $post->id }}</h1>
    <h1>Tiêu đề: {{ $post->title }}</h1>
    <h1>Nội dung: {{ $post->content }}</h1>
@endsection