@extends('layout.master')
@section('content')
<main id="main">

<h1>Chỉnh sửa Danh Mục</h1>
<form action="{{route('category.update',$category->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" id="fname" name="name" value='{{$category->name}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" id="fname" name="description" value='{{$category->description}}' class="form-control">
    </div>
    <input type="submit" value="Cập nhật" class="btn btn-primary">
    <a href="{{route('category.index')}}" class="btn btn-danger">Huỷ</a>

  </form>
  </main>
@endsection

