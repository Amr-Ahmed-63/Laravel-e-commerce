@extends("dashboard.layout.main")

@section("content")



<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

        @if (isset($mes))

        @forelse ($mes as $key=>$mes)



        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $mes->name }}</td>
            <td>{{ $mes->email }}</td>
            <td>{{ $mes->message }}</td>
            <td>
                <form action="{{route("message.destroy",$mes->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>

        </tr>

        @empty

        <p class="text-danger">Not Found</p>

        @endforelse

        @endif





    </tbody>
  </table>


@endsection
