@extends('layout.master')
@section('content')
    <main id="main">

        <h1>THêm Danh Mục</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('blog.store') }}" method="POST">
            @csrf
            <label for="fname">Name</label><br>
            <input type="text" id="fname" name="name"><br>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="lname">Description</label><br>
            <input type="text" id="lname" name="description"><br><br>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputEmail1" >danh mục truyện</label>
                <select name="category_id"  class="form-select" id="inputGroupSelect02">
                @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                </div>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Submit">
        </form>
    </main>
@endsection
