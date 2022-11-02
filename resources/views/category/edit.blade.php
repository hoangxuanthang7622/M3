@extends('layout.master')
@section('content')
<main id="main">

<h1>Chỉnh sửa Danh Mục</h1>
<form action="{{route('category.update',$category->id)}}" method="POST">
    @method('PUT')
    @csrf
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="name" value='{{$category->name}}'><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="description" value='{{$category->description}}'><br><br>
    <input type="submit" value="Submit">
  </form>
  </main>
@endsection

