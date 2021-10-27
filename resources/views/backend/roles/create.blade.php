@extends('backend.layouts.master')

@section('title')
    Create Permission
@endsection

@section('content-header')
    <h1>Creat new Permission</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.roles.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Tên Role">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Permission</label>
                            <select multiple="" class="form-control" name="permissions[]" aria-placeholder="1" aria-valuenow="1">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thêm role</button>

            </form>
        </div>
    </div>
@endsection
