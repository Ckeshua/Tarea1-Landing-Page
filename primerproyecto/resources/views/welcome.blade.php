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
<<<<<<< Updated upstream
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
=======
  <img src="{{asset('/logomenu1.png')}}" class="img-fluid" alt="...">
  
  @auth

  <ul class="nav justify-content-end" style="margin-left 30%">

    <li class="nav-item">
      <a class="nav-link" href="/home">Archivos</a>

    </li>

    <li class="nav-item">
      <a class="nav-link active" aria-current="page">Sesión iniciada</a>
    </li>
    <li class="nav-item">

      <form action="{{route('CerrarS')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Cerrar sesion</button>
      </form>
    </li>

    @endauth
    @guest
    <li class="nav-item" style="margin-left:40%">
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Login
        </button>
        <ul class="dropdown-menu"style = "margin-left: -70px">
          <div class="container h-100" style="width: 230px;px"style = "margin-left: -30px">
            <div class="row justify-content-center h-100 align-items-center">

              <form style="border:1px solid black;padding:1rem;border-radius: 0.5rem;" action="{{route('intentos')}}" method="post">

                @csrf
                <?php
                if (isset($error)) {
                  echo '<div class="alert alert-success">Usuario bloqueado durante 1 minuto</div>';;
                }
                ?>
                <div class="form-group">
                  <label for="Usuario">Nombre de Usuario</label>
                  <input type="email" name="email" placeholder="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label for="Clave">Clave</label>
                  <input type="password" name="password" placeholder="••••••••••" value="{{old('password')}}">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
        </ul>
      </div>

    </li>
    @endguest
  </ul>
>>>>>>> Stashed changes
</nav>


<body>
  @yield('content')
</body>

</html>