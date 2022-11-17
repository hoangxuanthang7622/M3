@extends('layout.master')
@section('content')
<main id="main">
    <!DOCTYPE html>
<html>
<style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

     table, th, td {
                border:1px solid black;
                }

</style>
<body>
<h2>Blog</h2>
<table style="width:100%" class="table">
<a href="{{route('blog.create')}}" class="btn btn-success">Thêm mới</a>
    <tr>
    <th>id</th>
    <th>Tên Bài viết</th>
    <th>Mô tả bài viết</th>
    <th>Danh mục bài viết</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @foreach ($items as $key => $value )
    <tr>
        <td>
            {{$key++ }}
         </td>
          <td>
            {{$value->name}}
         </td>
         <td>
            {{$value->description}}
         </td>
         <td>
            {{$value->category->name}}
         </td>
         <td>

                 {{-- <a href="{{ route('category.show', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i class="bi bi-eye-fill"></i></a>  --}}
                <a href="{{ route('blog.edit', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-pencil-square "></i></a>
                        <form action="{{ route('blog.destroy', $value->id) }}"
                            style="display:inline" method="post">
                <button
                    type="submit" class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-trash"></i></button>
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach

  </table>
</body>
</html>

</main>
@endsection
