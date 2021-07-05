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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <img src="{{asset('/partelogo.png')}}" class="img-fluid" alt="..." style="margin-left:18%">
  <img src="{{asset('/logomenu1.png')}}" class="img-fluid" alt="..." >

  @auth

  <ul class="nav justify-content-end" style="margin-left:30%">

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
</nav>


<body>
  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>