@extends('layout.master')
@section('content')
<main id="main">

<h1>Chỉnh sửa bài viết</h1>
<form action="{{route('blog.update',$blog->id)}}" method="POST">
    @method('PUT')
    @csrf
    <label for="fname">Name</label><br>
    <input type="text" id="fname" name="name" value='{{$blog->name}}'><br>
    <label for="lname">Description</label><br>
    <input type="text" id="lname" name="description" value='{{$blog->description}}'><br>
    <label for="lname">Category_id</label><br>
    <input type="text" id="lname" name="category_id" value='{{$blog->category_id}}'><br><br>
    <input type="submit" value="Submit">
  </form>
  </main>
@endsection

