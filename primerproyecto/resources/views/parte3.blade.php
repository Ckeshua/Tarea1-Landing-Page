@extends('welcome')



@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>


<body>
    <!--logo-->
    <nav class="navbar navbar-light bg-light mb-4" style="background-color: #b5cdd4 !important;">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <div class="d-flex">

                <label class="col-form-label me-2" style="font-weight: bold;">Filtro:</label>
                    <form action="generate-pdf" method="post">
                        @csrf
                        <select name="filter" class="form-select form-select-sm" aria-label=".form-select-sm example" style="margin-top: 40px" required>
                            <option value='' disabled="disabled" selected='selected'>Seleccionar tipo de archivo</option>
                            <option value="Contrato">Contrato</option>
                            <option value="Boletas">boletas</option>
                            <option value="Tipo 3">Tipo 3</option>
                            
                        </select>
                        <button class="btn btn-success" style="padding: 0;">S</button>
                    </form>
                </select>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item transparente">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed transparente" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                            <img src="{{asset('/folder.png')}}" class="img-fluid me-2" alt="...">
                                Archivos
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                @foreach($NOMBRE_ARCHIVOS AS $ARCHIVO)
                                <li class="list-group-item"> <img src="{{asset('/file.png')}}" class="img-fluid me-2" alt="...">{{ $ARCHIVO }}<a class="btn btn-success btn-sm" style="float: right;"href="{{route('VisualizarArchivos', ['nombre'=>$ARCHIVO]) }}" target="_blank">Previsualizar</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
        



        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-2">
            <a class="btn btn-primary" type="button" href="/home/escaner">Subir</a>

        </div>
    </div>



    <style>
        .list-group-item {
            border: none;
            background-color: transparent;
        }
        
        .jumbotron {
            background: #b5cdd4;
            border-radius: 39px;
            padding: 40px;
        }
        
        .accordion-button:focus {
            box-shadow: none;
        }
        
        .transparente {
            border: none;
            background-color: transparent !important;
        }
    </style>



    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
</body>



@endsection