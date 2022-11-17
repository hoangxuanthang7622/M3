@extends('layout.master')
@section('content')
<main id="main">

<h1>THêm Danh Mục</h1>
<form action="{{route('category.store')}}" method="POST">
    @csrf
    <label for="fname">Name</label><br>
    <input type="text" id="fname" name="name" ><br>
    <label for="lname">Description</label><br>
    <input type="text" id="lname" name="description" ><br><br>
    <input type="submit" value="Submit">
  </form>
  </main>
@endsection
