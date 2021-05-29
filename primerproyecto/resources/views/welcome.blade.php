<!DOCTYPE html>
<html lang="en">
<style>
  body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <img src="{{asset('/partelogo.png')}}" class="img-fluid" alt="..." style="margin-left:18%">
  <img src="{{asset('/logomenu1.png')}}" class="img-fluid" alt="..." >

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      


    </ul>
    <ul class="nav justify-content-end">
      @auth
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Sesión iniciada</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" method="post" action="{{route('CerrarS')}}">Cerrar sesion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Archivos</a>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a class="nav-link" href="/login">Iniciar sesion</a>
      </li>
      @endguest
    </ul>
  </div>
</nav>


<body>
  @yield('content')
</body>

</html>