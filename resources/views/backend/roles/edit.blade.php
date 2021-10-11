@extends('backend.layouts.master')

@section('title')
    Edit Permission
@endsection

@section('content-header')
    <h1>Edit Permission</h1>
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.roles.update', $roles->id) }}">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ $roles->name }}">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Permission</label>
                            <select multiple="" class="form-control" name="permissions[]" aria-placeholder="1"
                                aria-valuenow="1">
                                @foreach ($permissions as $permission)
                                    @foreach ($roles->permissions as $role_permission)
                                        @php
                                            $selected = '';
                                            if ($role_permission->id == $permission->id) {
                                                $selected = 'selected';
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                    <option value="{{ $permission->id }}" {{ $selected }}>{{ $permission->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Thay đổi</button>

            </form>
        </div>
    </div>
@endsection
