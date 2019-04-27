@extends('layout')

@section('content')
  	<div class="card mt-3 bg-light" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">Taison Digital Ltd. Exam</h5>
	    <h6 class="card-subtitle mb-2 text-muted">Examinee: Milko A. Santos Jr.</h6>
	    <p class="card-text">Laravel 5.7 CRUD and sending email Exam</p>
	    <a href="{{ url('products') }}" class="btn btn-dark">Link to Products</a>
	  </div>
	</div>
@endsection('content')

