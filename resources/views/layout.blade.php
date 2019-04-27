<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Taison Exam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
    	<!-- A grey horizontal navbar that becomes vertical on small screens -->
    	<div class="container">
		<nav class="navbar navbar-expand-sm bg-dark">

		  <!-- Links -->
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link" href={{ url('') }}>Home</a>
		    </li>
		    <!-- <li class="nav-item">
		      <a class="nav-link" href="#">Link 2</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Link 3</a>
		    </li> -->
		  </ul>

		</nav>
			<div class="container">
			@yield('content')
			</div>
		</div>
	</body>
</html>