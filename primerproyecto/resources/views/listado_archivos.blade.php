<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado Archivos</title>
</head>

<body class="p-5">

    <table class="table table-light">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($NOMBRE_ARCHIVOS AS $ARCHIVO)
            <tr>
                <td>{{ $ARCHIVO }}</td>
                <td>
                    <a class="btn btn-success btn-sm btn-block" href="{{route('VisualizarArchivos', ['nombre'=>$ARCHIVO]) }}" target="_blank">Previsualizar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
