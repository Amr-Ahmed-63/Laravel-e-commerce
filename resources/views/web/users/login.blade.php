@extends("dashboard.layout.main")

@section("content")

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="login" method="POST">
          @csrf

          @error('email')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="form-group">
            <div class="form-label-group">
             <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>

          @error('password')
          <p class="text-danger">{{ $message }}</p>
          @enderror

          <div class="form-group">
           <div class="form-label-group">
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" >
              <label for="inputPassword">Password</label>
            </div>
           </div>


           @if(isset($error))
           <span class="text-danger pp">{{$error}}</span>
           @endif


          <button class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="user/create/">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

@endsection
