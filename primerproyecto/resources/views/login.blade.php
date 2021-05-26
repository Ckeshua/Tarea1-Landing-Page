<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="justify-content-center align-items-center row vh-100 m-0">
    <form action="/" method="post">
    @csrf
    <input type="text" name="rut" placeholder="Rut">
    <input type="password" name="contra" placeholder="••••••••••">
    <button class="btn btn-primary btn-block">
            Enviar

    </button>

    </form>
</body>
</html>