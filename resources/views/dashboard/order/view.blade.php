@extends("dashboard.layout.main")

@section("content")


<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User ID</th>
        <th scope="col">Products</th>
        <th scope="col" colspan="2">Delete</th>
      </tr>
    </thead>
    <tbody>


        @if ( count($orders_arr) > 1 )



        @foreach($orders_arr as $key => $orders)




<tr>
    <th scope="row">{{++$key}}</th>
    <td>{{$users_ordered[--$key]}}</td>
    <td>
        @foreach ($orders as $order)

        {{$order["product_name"]}}
        <b class="text-success">{{$order["count"]}}</b>,

        @endforeach
    </td>

    <td class="d-flex">

        <form action="{{route("order.destroy",$key)}}" method="POST" >
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger ml-2">Delete</button>
        </form>
    </td>
</tr>

{{-- @endforeach --}}
        @endforeach

        @endif





    </tbody>
  </table>


@endsection
