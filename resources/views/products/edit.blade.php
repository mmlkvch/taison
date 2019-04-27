@extends('layout')

@section('content')
<a href="{{ url('products') }}" class="btn my-1 btn-warning"><i class="fa fa-angle-left"></i> Back</a>
<div class="card mt-1">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" name="name" value={{ $product->name }} />
        </div>
        <div class="form-group">
          <label for="price">Product Price :</label>
          <input type="text" class="form-control" name="price" value={{ $product->price }} />
        </div>
        <div class="form-group">
          <label for="quantity">Product Quantity:</label>
          <input type="text" class="form-control" name="quantity" value={{ $product->quantity }} />
        </div>
        <div class="form-group">
          <label for="quantity">Product Size:</label>
          <input type="text" class="form-control" name="size" value={{ $product->size }} />
        </div>
        <div class="form-group">
          <label for="quantity">Product Code:</label>
          <input type="text" class="form-control" name="code" value={{ $product->code }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection