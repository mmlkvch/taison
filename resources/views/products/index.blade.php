@extends('layout')

@section('content')
	<div class="my-1">
		<a href="{{ url('products/create')}}" class="btn btn-success">Add Product</a>
		<a href="{{ route('products.cart')}}" class="btn btn-info">Cart</a>
	</div>

    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  	@endif
    	<table class="table table-dark table-hover">
		    <thead>
		        <tr>
		          <td>ID</td>
		          <td>Product Name</td>
		          <td>Product Price</td>
		          <td>Product Quantity</td>
		          <td>Product Size</td>
		          <td>Product Code</td>
		          <td colspan="3" class="text-center">Action</td>
		        </tr>
		    </thead>
		    <tbody>
		        @foreach($products as $product)
		        <tr>
		            <td>{{$product->id}}</td>
		            <td>{{$product->name}}</td>
		            <td>{{ number_format($product->price,2) }}</td>
		            <td class="text-center">{{$product->quantity}}</td>
		            <td>{{$product->size}}</td>
		            <td>{{$product->code}}</td>
		            <td><a href="{{ route('products.addToCart',$product->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></td>
		            <td><a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
		            <td>
		                <form action="{{ route('products.destroy', $product->id)}}" method="post">
		                  @csrf
		                  @method('DELETE')
		                  <button class="btn btn-danger" type="submit">Delete</button>
		                </form>
		            </td>
		            
		        </tr>
		        @endforeach
		    </tbody>
	  	</table>
    </div>

    
@endsection('content')

