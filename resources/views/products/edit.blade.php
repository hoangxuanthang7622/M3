@extends('layout.master')
@section('content')
<main id="main">

<h1>product</h1>
<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" id="fname" name="name" value='{{$product->name}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Loại sản phẩm</label>
        <select name="category_id" id="" class="form-control">
            {{-- <option value="">Loại sản phẩm</option> --}}
            @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Giá sản phẩm</label>
        <input type="text" id="fname" name="price" value='{{$product->price}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Hình ảnh</label>
        <input type="text" id="fname" name="image" value='{{$product->image}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <input type="text" id="fname" name="description" value='{{$product->description}}' class="form-control">
    </div>
    <input type="submit" value="Cập nhật" class="btn btn-primary">
    <a href="{{route('products.index')}}" class="btn btn-danger">Huỷ</a>

  </form>
  </main>
@endsection

