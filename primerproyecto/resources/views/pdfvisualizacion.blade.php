<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <!--logo-->
    <div class="container">
        <img src="{{asset('/partelogo.png')}}" class="img-fluid" alt="...">
        <img src="{{asset('/logomenu1.png')}}" class="img-fluid" alt="...">
    </div>
    <header>
        <!--mokup-->
        <div>
            <div>
                <h4>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sesión iniciada</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cerrar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Archivos</a>
                        </li>
                </h4>
                </ul>

                <hr>
                <!--PDF-->
                <iframe src="{{route('VisualizarArchivos', ['nombre'=>$ARCHIVO]) }}" width="100%" height="500px">
    </iframe>
</body>

</html>