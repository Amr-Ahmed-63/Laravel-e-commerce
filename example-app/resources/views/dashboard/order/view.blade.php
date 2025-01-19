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


        @if (isset($orders))



        @foreach($orders as $key => $orders)



        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$orders->user_id}}</td>
            <td>
                {{$orders->products_id}}
            </td>

            <td class="d-flex">

                <form action="{{route("order.destroy",$orders->user_id)}}" method="POST" >
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="products_id" value="{{$orders->products_id}}">
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach

        @endif





    </tbody>
  </table>


@endsection
