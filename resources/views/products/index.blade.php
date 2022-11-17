@extends('layout.master')
@section('content')
    <!DOCTYPE html>
<html>
<style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

     table, th, td {
                border:1px solid black;
                }

</style>
<main id="main">
<body>
<h2>Product</h2>

@include('sweetalert::alert')

<table style="width:100%" class="table">
<a href="{{route('product.create')}}" class="btn btn-success">Thêm mới</a>

    <tr>
    <th>STT</th>
    <th>Tên sản phẩm</th>
    <th>Loại sản phẩm</th>
    <th>Giá</th>
    <th>Hình ảnh</th>
    <th>Mô tả</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @foreach ($items as $key => $value )
    <tr>
        <td>
            {{++$key }}
         </td>
          <td>
            {{$value->name}}
         </td>
         <td>
            {{$value->category->name}}
         </td>
         <td>
            {{$value->price}}
         </td>
         <td>
            <img src="{{ asset('storage/images/' . $value->image) }}"  style="width:100px;">
         </td>
         <td>
            {{$value->description}}
         </td>
         <td>


                 {{-- <a href="{{ route('categories.show', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i class="bi bi-eye-fill"></i></a> --}}
                <a href="{{ route('product.edit', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-pencil-square"></i></a>
                        <form onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" action="{{ route('product.destroy', $value->id) }}"
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
{{ $items->links() }}
