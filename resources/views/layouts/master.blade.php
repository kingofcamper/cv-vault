<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">brand</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a></li>
   
          <li class="nav-item"><a class="nav-link" href="{{url('accueil')}}">accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('service')}}">service</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">contact</a></li>
    </ul>
  </div>
</nav>

@yield('content')

	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootsrap.min.js')}}"></script>
</body>
</html>