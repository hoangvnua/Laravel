@extends('admin.layouts.master')

@section('title')
    Viết bài
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
                        <h4>Viết bài</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Viết bài</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form action="{{ route('backend.posts.update', $post->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Têu đề</label>
                    <input class="form-control" type="text" value="{{ $post->title }}" placeholder="Nhập tiêu đề"
                        name="title">
                </div>
                <div class="preview-upload">
                    <img id='sp_hinh-upload' src="{{ $post->img_url }}" />
                </div>
                <div class="form-group">
                    <label>Tải ảnh lên</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" value="{{ $post->img_url }}" id="sp_hinh"
                            name="image">
                        <label class="custom-file-label">Chọn ảnh</label>
                    </div>
                </div>
                <div class="html-editor pd-20 card-box mb-30">
                    <label>
                        Nội dung
                    </label>
                    <textarea class="textarea_editor form-control border-radius-0" name="content"
                        placeholder="Nội dung ...">
                            {{ $post->content }}
                        </textarea>
                </div>

                <div class="form-group mb-30">
                    <label>Thẻ</label>
                    <select multiple data-role="tagsinput" style="width: 100%;" name="tags[]">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5"
                            name="status">
                            <option value="{{ $post->status }}">{{ $post->status_text }}</option>
                            <option value="1">Đã viết xong</option>
                            <option value="0">Chưa công khai</option>
                            <option value="2">Công khai</option>
                            </optgroup>
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
