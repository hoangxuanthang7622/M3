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

@include('sweetalert::alert')
<table style="width:100%" class="table">
<a href="{{route('order.create')}}" class="btn btn-success">Thêm mới</a>
    <tr>
    <th>STT</th>
    <th>Mã khách hàng</th>
    <th>Ngày đặt hàng</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @foreach ($items as $key => $value )
    <tr>
        <td>
            {{++$key }}
        </td>
        <td>
          {{$value->user->user_id}}
       </td>
         <td>
             {{$value->order_day}}
            </td>
            <td>
                {{-- <a href="{{ route('categories.show', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i class="bi bi-eye-fill"></i></a> --}}
                <a href="{{ route('order.edit', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-pencil-square"></i></a>
                        <form onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" action="{{ route('order.destroy', $value->id) }}"
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

{!! $items->withQueryString()->links('pagination::bootstrap-5') !!}

</main>

@endsection

