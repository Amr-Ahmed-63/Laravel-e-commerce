@extends("dashboard.layout.main")

@section("content")


<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Email</th>
        <th scope="col">Products</th>
        <th scope="col" colspan="2">Delete</th>
      </tr>
    </thead>
    <tbody>


        @if (isset($arr_all))



        @foreach($arr_all as $key => $arr_all)



        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$user_email[0][0]->email}}</td>
            <td>
                @foreach ($arr as $k=>$arr)
                {{$arr[0]->name}},
                @endforeach
            </td>
            <td class="d-flex">

                <form action="{{route("order.destroy",$user_id[0])}}" method="POST" >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach

        @endif





    </tbody>
  </table>


@endsection
