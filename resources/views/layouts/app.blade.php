<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/96cce29f82.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Semana i</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
         </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
               <a class="nav-link" href="/inventory"><i class="fa fa-archive"></i> Inventario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/add-product"><i class="fa fa-plus-circle"></i> Alta de Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/orders"><i class="fa fa-pencil-square-o"></i> Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/status"><i class="fa fa-tasks" aria-hidden="true"></i> Estatus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/racks"><i class="fa fa-align-justify" aria-hidden="true"></i> Racks</a>
              </li>
         </ul>
        </div>
        </nav>
        <br>
        @yield('content')
        

    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>