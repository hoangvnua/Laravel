@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa thương hiệu
@endsection

@section('content-header')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Thêm mới thương hiệu
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.brands.index') }}">Thương hiệu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form method="POST" action="{{ route('backend.brands.update', $brand->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Tên thương hiệu</label>
                    <input class="form-control" type="text" value="{{ $brand->name }}"
                        placeholder="Nhập tên thương hiệu" name="name">
                </div>
                <div class="preview-upload">
                    <img id='sp_hinh-upload' src="{{ $brand->img }}" width="210px" />
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" value="{{ $brand->img }}" id="sp_hinh" name="image">
                        <label class="custom-file-label">Chọn ảnh</label>
                    </div>
                </div>

                <br>
                <div style="text-align: right">
                    <button class="btn btn-primary">Chỉnh sửa</button>
                </div>
            </form>

        </div>
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
