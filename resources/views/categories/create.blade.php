@extends('layout.master')
@section('content')
<main id="main">

<h1>Thêm Danh Mục</h1>
<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" id="fname" name="name" class="form-control">
        @error('name')
        <div style="color: red">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" id="fname" name="description" class="form-control">
        @error('description')
        <div style="color: red">{{ $message }}</div>
    @enderror
    </div>
    <input type="submit" value="Lưu" class="btn btn-success">
    <a href="{{route('category.index')}}" class="btn btn-danger">Huỷ</a>
  </form>
  </main>
@endsection
