@extends('backend.layouts.master')

@section('title')
    Chỉnh sửa chức vị
@endsection

@section('content-header')<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chỉnh sửa chức vị</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('backend.roles.update', $roles->id) }}">
                @method('PUT')
                @csrf
                
                <label for="">Tên Chức vị</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ $roles->name }}">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Quyền hạn</label>
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
