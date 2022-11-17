@extends('layout.master')
@section('content')
    <main id="main">

        <h1>Thêm sản phẩm</h1>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" id="fname" name="name" class="form-control">
                @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Loại sản phẩm</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">-Vui Lòng Chọn-</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Giá sản phẩm</label>
                <input type="text" id="fname" name="price" class="form-control">
                @error('price')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" id="fname" name="image" class="form-control">
                @error('image')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" id="fname" name="description" class="form-control">
                @error('description')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="lưu" class="btn btn-success">
    <a href="{{route('product.index')}}" class="btn btn-danger">Huỷ</a>

        </form>
    </main>
@endsection
