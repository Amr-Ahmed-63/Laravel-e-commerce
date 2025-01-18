@extends("dashboard.layout.main")

@section("content")

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form action="{{ route("admin.update",$admin->id) }}" method="post">
          @csrf
          @method("PUT")

@error('name')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="name" type="text" id="inputName" class="form-control" value="{{ $admin->name }}" placeholder="Name"  autofocus="autofocus">
              <label for="inputName">Name</label>
            </div>
          </div>

@error('email')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="email" type="email" id="inputEmail" class="form-control" value="{{ $admin->email }}" placeholder="Email address"  autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>

           <div class="form-group">
            <div class="form-label-group">
                <select name="gender" type="select" >
                    <option value="1" @selected( $admin->gender == 1)>Male</option>
                    <option value="0" @selected( $admin->gender == 0)>Female</option>
                </select>
              </div>
            </div>

          <span class="text-danger pp"></span>
          </span>

@error('permission')
<p class="text-danger">{{ $message }}</p>
@enderror

          <span>Allow admin to:</span>
          @foreach (config("permissions.permission") as $key=>$value)

          <div class="form-group">
              <div class="checkbox">
                  <input @checked(in_array($value,$admin->permission)) type="checkbox" name="permission[]" value="{{ $value }}">
                  <label>{{ $key }}</label>
                </div>
            </div>

            @endforeach

          <button class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

@endsection
