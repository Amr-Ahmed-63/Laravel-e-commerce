@extends("dashboard.layout.main")

@section("content")

@if($access == "true")

<a href="{{ route("admin.create") }}" class="btn btn-primary m-5">Add Admin</a>

@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        @if($access == "true")
        <th scope="col" colspan="2">edit</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @if (isset($admin))

        @forelse ($admin as $key=>$value)



        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->gender==1?"Male":"Female" }}</td>
            @if($access == "true")

            <td class="d-flex">
                <a href="{{ route("admin.show",$value->id) }}" class="btn btn-success">Update</a>
            </td>
            <td>
                <form action="{{route("admin.destroy",$value->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>

            @endif
        </tr>

        @empty

        <p class="text-danger">Not Found</p>

        @endforelse

        @endif





    </tbody>
  </table>


@endsection
