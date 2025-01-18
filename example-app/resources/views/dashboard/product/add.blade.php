@extends("dashboard.layout.main")

@section("content")

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="{{ route("product.store") }}" method="post" enctype="multipart/form-data">
          @csrf


          @error("name")
          <p class="text-danger"> {{ $message }} </p>
          @enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="name" type="text" id="inputName" class="form-control" placeholder="Name"  autofocus="autofocus">
              <label for="inputName">Name</label>
            </div>
          </div>

          @error("price")
          <p class="text-danger"> {{ $message }} </p>
          @enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="price" type="number" id="inputPrice" class="form-control" placeholder="Price address"  autofocus="autofocus">
              <label for="inputPrice">Price</label>
            </div>
          </div>

          @error("sale")
          <p class="text-danger"> {{ $message }} </p>
          @enderror

          <div class="form-group">
           <div class="form-label-group">
              <input name="sale" type="number" id="inputSale" class="form-control" placeholder="Sale" >
              <label for="inputSale">Sale</label>
            </div>
           </div>

           @error("count")
           <p class="text-danger"> {{ $message }} </p>
           @enderror

          <div class="form-group">
           <div class="form-label-group">
              <input name="count" type="number" id="inputCount" class="form-control" placeholder="Count" >
              <label for="inputCount">Count</label>
            </div>
           </div>

           @error("gender")
           <p class="text-danger"> {{ $message }} </p>
           @enderror

           <div class="form-group">
            <div class="form-label-group">
                <select name="category" type="select" >
                    @foreach (config("categories.category") as $value)

                    <option value="{{ $value }}">{{ $value }}</option>

                    @endforeach
                </select>
              </div>
            </div>

            @error("img")
            <p class="text-danger"> {{ $message }} </p>
            @enderror

            <div class="form-group">
                <div class="form-label-group">
                   <input name="img" type="file" multiple id="inputImg" class="form-control" placeholder="Img" >
                 </div>
                </div>

          <span class="text-danger pp"></span>
          </span>


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
