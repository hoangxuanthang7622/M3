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
        <label class="form-label">Mô tả</label>
        <input type="text" id="fname" name="description" value='{{$product->description}}' class="form-control">
    </div>
 
    <div class="form-group">
        <label for="inputTitle">Ảnh Sản Phẩm</label><br>
        <input accept="image/*" type='file' id="imgInp" name="image" /><br><br>
        <img type="hidden" width="90px" height="90px" id="blah1"
            src="{{ asset('storage/images/' .$product->image) ?? $request->inputFile }}" alt="" /> <br>
        {{-- @error('inputFile')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
    </div>
    <input type="submit" value="Cập nhật" class="btn btn-primary">
    <a href="{{route('product.index')}}" class="btn btn-danger">Huỷ</a>

  </form>
  </main>
@endsection

