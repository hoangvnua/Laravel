@extends('admin.layouts.master')

@section('title')
    Thêm người dùng
@endsection

@section('style')
    .preview-upload {
    display: block;
    padding: 10px;
    }

    .preview-upload img {
    width: 40%;
    }
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Thêm người dùng</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form method="POST" action="{{ route('backend.users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input class="form-control" type="text" placeholder="Nhập tên" name="name">
                </div>
                <div class="preview-upload">
                    <img id='sp_hinh-upload' />
                </div>
                <div class="form-group">
                    <label>Tải ảnh lên</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sp_hinh" name="avatar">
                        <label class="custom-file-label">Chọn ảnh</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" placeholder="abc@gmail.com" name="email">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
                </div>

                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input class="form-control" type="password" placeholder="Nhập lại mật khẩu"
                        name="password_confirmation">
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="number" placeholder="Số điện thoại" name="phone">
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" placeholder="Địa chỉ" name="address">
                </div>

                <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control" name="roles[]" aria-placeholder="1" aria-valuenow="1">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>
                </div>
                {{-- <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5"
                        name="status">
                        <option value="1">Đã viết xong</option>
                        <option value="0">Chưa công khai</option>
                        <option value="2">Công khai</option>
                        </optgroup>
                    </select>
                </div>
            </div> --}}
                <div style="text-align: right">
                    <button class="btn btn-success">Tạo mới</button>
                </div>
            </form>
        </div>
    @endsection

    @section('custom-scripts')
        <script>
            // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#sp_hinh-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
            $("#sp_hinh").change(function() {
                readURL(this);
            });
        </script>
    @endsection
