@extends("dashboard.layout.main")

@section("content")

<a href="{{ route("product.create") }}" class="btn btn-primary m-5">Add Product</a>


<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Sale</th>
        <th scope="col">Count</th>
        <th scope="col">Category</th>
        <th scope="col">Image</th>
        <th scope="col" colspan="2">edit</th>
      </tr>
    </thead>
    <tbody>


        @if (isset($product))


        @forelse ($product as $key=>$value)



        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{ $value["name"] }}</td>
            <td>{{ $value["price"] }}</td>
            <td>{{ $value["sale"] }}</td>
            <td>{{ $value["count"] }}</td>
            <td>{{ $value["category"] }}</td>
            @foreach ($image as $img)
            @if($value["id"] == $img["product_id"])
            <td><img style="height: 50px" style="width: 50px" src="{{ asset("storage/images/".$img['image']) }}" alt=""></td>
            @endif
            @endforeach
            <td></td>
            <td class="d-flex">
                <a href="{{route("product.edit",$value->id)}}" class="btn btn-success">Update</a>

                <form action="{{route("product.destroy",$value["id"])}}" method="POST" >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
        </tr>

        @empty

        <p class="text-danger">Not Products</p>

        @endforelse

        @endif

        @if (!isset($product))
        <a href="{{ route("product.index") }}" class="btn btn-primary m-5">Show Products</a>
        @endif



    </tbody>
  </table>


@endsection
