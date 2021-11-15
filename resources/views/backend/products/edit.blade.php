@extends('backend.layouts.master')

@section('title')
    {{ $product->name }}
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="card card-primary">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backend.products.store') }}"
            enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $product->name }}" placeholder="Nhập tên sản phẩm...">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Thêm hình ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                        </div>
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
                        value="{{ $product->price_format }}" placeholder="Nhập giá sản phẩm...">
                    @error('origin_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <input type="number" name="percent" class="form-control @error('percent') is-invalid @enderror"
                        id="exampleInputEmail1" max="100" value="{{ $product->sale_price_format*100/$product->price_format }}" placeholder="Giảm ...%">
                    @error('percent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Danh mục sản phẩm</label>
                    <select class="form-control" name="category_id" aria-placeholder="1" aria-valuenow="1">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label>Nhà sản xuất</label>
                    <select class="form-control" name="brand_id" aria-placeholder="1" aria-valuenow="1">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    @include('backend.component.summernote')
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
                </div> --}}

                <!-- select -->

                <div class="form-group">
                    <label>Thẻ</label>
                    <div class="select2-purple">
                        <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Chọn thẻ"
                            style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status" aria-placeholder="1" aria-valuenow="1">
                        <option value="1">Đã viết xong</option>
                        <option value="0">Chưa công khai</option>
                        <option value="2">Công khai</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="float: right">Tạo mới</button>
            </div>
        </form>
    </div>

@endsection
