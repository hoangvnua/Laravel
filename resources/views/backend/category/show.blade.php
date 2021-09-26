@extends('backend.layouts.master')
@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <h1>{{ $category->id }}</h1>
    <h1>{{ $category->name }}</h1>
@endsection