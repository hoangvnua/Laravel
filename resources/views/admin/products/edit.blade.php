@extends('admin.layouts.master')

@section('title')
    {{ $product->name }}
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
                        <h4>{{ $product->name }}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form method="post" action="{{ route('backend.products.update', $product->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" value="{{ $product->name }}" placeholder="Nhập tên sản phẩm"
                        name="name">
                </div>
                <div class="preview-upload">
                    <img id='sp_hinh-upload' src="{{ $product->img }}" />
                </div>
                <div class="form-group">
                    <label>Tải ảnh lên</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sp_hinh" name="image">
                        <label class="custom-file-label">Chọn ảnh</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <input type="number" name="quatity" class="form-control @error('quatity') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $product->quatity }}" placeholder="Nhập số lượng sản phẩm...">
                    @error('quatity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Giá</label>
                    <input type="number" name="origin_price"
                        class="form-control @error('origin_price') is-invalid @enderror" id="exampleInputEmail1"
                        value="{{ $product->origin_price }}" placeholder="Nhập giá sản phẩm...">
                    @error('origin_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <input type="number" name="sale_price" class="form-control @error('percent') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $product->sale_price }}" placeholder="Giá giảm ...">
                    @error('percent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Danh mục sản phẩm</label>
                    <select class="form-control" name="category_id" aria-placeholder="1" aria-valuenow="1">
                        @foreach ($categories as $cate)
                            @php
                                $selected = '';
                                if ($product->category->id == $cate->id) {
                                    $selected = 'selected';
                                }
                            @endphp
                            <option value="{{ $cate->id }}" {{ $selected }}>{{ $cate->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="html-editor pd-20 card-box mb-30">
                    <label>
                        Nội dung
                    </label>
                    <textarea class="textarea_editor form-control border-radius-0" name="content"
                        placeholder="Nội dung ...">{{ $product->content }}</textarea>
                </div>

                <div style="display: flex">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5"
                                name="brand">
                                @foreach ($brands as $brand)
                                    @foreach ($brands as $br)
                                        @php
                                            $selected = '';
                                            if ($product->brand_id == $br->id) {
                                                $selected = 'selected';
                                            }
                                        @endphp
                                        break;
                                    @endforeach

                                    <option value="{{ $brand->id }}" @if (isset($selected)) {{ $selected }} @endif>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Thẻ</label>
                            <select class="custom-select2 form-control" name="tags[]" multiple="multiple"
                                style="width: 100%;">
                                @foreach ($tags as $tag)
                                    @foreach ($product->tags as $product_tag)
                                        @php
                                            $selected = '';
                                            if ($product_tag->id == $tag->id) {
                                                $selected = 'selected';
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                    <option value="{{ $tag->id }}" @if (isset($selected)) {{ $selected }} @endif>{{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5"
                            name="status">
                            <option value="1">Đã viết xong</option>
                            <option value="0">Chưa công khai</option>
                            <option value="2">Công khai</option>

                        </select>
                    </div>
                </div>
                <div style="text-align: right">
                    <button class="btn btn-success">Cập nhật</button>
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
