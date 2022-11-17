@extends('layout.master')
@section('content')
<main id="main">

<h1>Chỉnh sửa </h1>
<form action="{{route('user.update',$user->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên nhân viên</label>
        <input type="text" id="fname" name="name" value='{{$user->name}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" id="fname" name="email" value='{{$user->email}}' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Mật khẩu</label>
        <input type="text" id="fname" name="password" value='{{$user->password}}' class="form-control">
    </div>
    <input type="submit" value="Cập nhật" class="btn btn-primary">
    <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ</a>

  </form>
  </main>
@endsection


