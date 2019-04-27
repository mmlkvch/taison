@extends('layout')

@section('content')

    @if(session('cart'))
    	<?php $total = 0 ?>
    	<a href="{{ url('products') }}" class="btn my-1 btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
    	<a href="{{ route('products.send') }}" class="btn my-1 btn-info"><i class="fa fa-angle-left"></i> Send Data</a>

    	<table id="cart" class="table table-hover table-condensed">
		    <thead>
		    <tr>
		        <th>Product Name</th>
		        <th>Product Code</th>
		        <th>Product Size</th>		        
		        <th>Product Price</th>
		        <th class="text-center">Product Quantity</th>
		        
		        <th class="text-center">Subtotal</th>
		        <!-- <th>Actions</th> -->
		    </tr>
		    </thead>
		    <tbody>
        @foreach(session('cart') as $id => $details)

            <?php 
            $total += $details['price'] * $details['quantity'];
            $sub_total = $details['price'] * $details['quantity'];
            ?>

            <tr>
                <td data-th="Product Name">{{ $details['name'] }}</td>
                <td data-th="Product Code">{{ $details['code'] }}</td>
                <td data-th="Product Size">{{ $details['size'] }}</td>
                <td data-th="Product Price">{{ $details['price'] }}</td>                
                <td data-th="Product Quantity" class="text-center">{{ $details['quantity'] }}</td>
                <td data-th="Subtotal" class="text-center">{{ number_format($sub_total,2) }}</td>
            </tr>
        @endforeach

	        </tbody>
		    <tfoot>
		    <!-- <tr class="visible-xs">
		        <td class="text-center"><strong>Total {{ $total }}</strong></td>
		    </tr> -->
		    <tr>
		        <td colspan="5" class="hidden-xs"></td>
		        <td class="hidden-xs text-center"><strong>Total {{ number_format($total,2) }}</strong></td>
		    </tr>
		    </tfoot>
		</table>

    @else
    	<a href="{{ url('products') }}" class="btn my-1 btn-warning"><i class="fa fa-angle-left"></i> Go Shop</a>

    	@if(session()->get('success'))
	    <div class="alert alert-success">
	      {{ session()->get('success') }}  
	    </div>
	  	@endif
    	<h3>{{ 'No Item in the cart.' }}</h3>
    	
    @endif

    
@endsection('content')