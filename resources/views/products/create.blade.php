@extends('layout')

@section('content')
<a href="{{ url('products') }}" class="btn my-1 btn-warning"><i class="fa fa-angle-left"></i> Back</a>
<div class="card mt-1">
  <div class="card-header">
    Add Product
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
      <form method="post" action="{{ route('products.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Product Price :</label>
              <input type="number" step="0.01" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Product Quantity:</label>
              <input type="number" class="form-control" name="quantity"/>
          </div>
          <div class="form-group">
              <label for="size">Product Size:</label>
              <input type="text" class="form-control" name="size"/>
          </div>
          <div class="form-group">
              <label for="code">Product Code:</label>
              <input type="text" class="form-control" maxlength="4" name="code"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection('content')