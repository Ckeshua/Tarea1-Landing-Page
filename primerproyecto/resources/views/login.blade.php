<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #FFFFFF;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         .form-signin .checkbox {
            font-weight: normal;
         }

         h2{
            text-align: center;
            color: #017572;
         }
         
    </style>

</head>
<body>
    <h2>Inicio de Sesion</h2>
    <div class= "container">
    <?php 
        if(isset($error)) {
            echo '<div class="alert alert-success">Usuario bloqueado durante 1 minuto</div>';;
        }
    ?>
    <form action="/" method="post">
    @csrf
    <input type="text" class='form-control' name="rut" 
        placeholder="Rut" required autofocus>
    <input type="password" class='form-control' name="contra" 
        placeholder="••••••••••" required autofocus>
    <button class="btn btn-lgn btn-primary btn-block"
         type="submit" name="enviar">Iniciar Sesion
    </button>

    </form>
    </div>
</body>
</html>