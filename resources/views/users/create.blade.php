@extends('layout.master')
@section('content')
<main id="main">

<h1>Thêm nhân viên</h1>
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên nhân viên</label>
        <input type="text" id="fname" name="name" class="form-control">
        @error('name')
        <div style="color: red">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" id="fname" name="email" class="form-control">
        @error('email')
        <div style="color: red">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Mật khẩu</label>
        <input type="text" id="fname" name="password" class="form-control">
        @error('password')
        <div style="color: red">{{ $message }}</div>
    @enderror
    </div>
    <input type="submit" value="Lưu" class="btn btn-success">
    <a href="{{route('user.index')}}" class="btn btn-danger">Huỷ</a>

  </form>
  </main>
@endsection

