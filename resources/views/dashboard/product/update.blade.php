@extends("dashboard.layout.main")

@section("content")

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form action="{{ route("product.update",$product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")

@error('name')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="name" type="text" id="inputName" class="form-control" value="{{ $product->name }}" placeholder="Name"  autofocus="autofocus">
              <label for="inputName">Name</label>
            </div>
          </div>

@error('price')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="price" type="number" id="inputPrice" class="form-control" value="{{ $product->price }}" placeholder="Price"  autofocus="autofocus">
              <label for="inputPrice">Price</label>
            </div>
          </div>

@error('sale')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="sale" type="number" id="inputSale" class="form-control" value="{{ $product->sale }}" placeholder="Sale"  autofocus="autofocus">
              <label for="inputSale">Sale</label>
            </div>
          </div>

@error('count')
<p class="text-danger">{{ $message }}</p>
@enderror

          <div class="form-group">
            <div class="form-label-group">
             <input name="count" type="number" id="inputCount" class="form-control" value="{{ $product->count }}" placeholder="Count"  autofocus="autofocus">
              <label for="inputCount">Count</label>
            </div>
          </div>

           <div class="form-group">
            <div class="form-label-group">
                <select name="category" type="select" >
                    <option value="labs" @selected( $product->category == "labs")>labs</option>
                    <option value="phones" @selected( $product->category == "phones")>phones</option>
                    <option value="tvs" @selected( $product->category == "tvs")>tvs</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                   <input name="img" type="file" multiple id="inputImg" class="form-control" placeholder="Img" >
                </div>
            </div>

          <span class="text-danger pp"></span>

          <button class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection
