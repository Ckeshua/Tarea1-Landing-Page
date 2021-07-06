@extends('welcome')



@section('content')

<div class="col text-center" style="margin-top: 0px" >
     <div class="jumbotron" style="margin-top:30px;background-image: url('/valdivia.png');height: 30vh">
     <h1 class="font-weight-bold" style="color: White;margin-top: 40px;font-size:90px">Scanfast</h1>
     <p class="font-weight-bold" style="color: White;margin-top: 40px;font-size:20px">ScanFast es un repositorio donde se puedan subir archivos pdf mediante el scanner de archivos físicos, permitiendo una visualización de estos archivos separados por filtro y nivel.</p>    
    </div>
    

    <div class="container" style="margin-top: 30px;" >
      <h1>Equipo 8 Integrantes</h1>    
      <div class="row" style="margin-top: 70px">
        <div class="col-md-4">
          <h3>Eduardo Mellado</h3>
          <img src="{{asset('/Eduardo.png')}}" class="img-fluid" alt="...">
          <p>Scrum Master</p>
        </div>
        <div class="col-md-4" >
          <h3>Julio Ferreira</h3>
          <img src="{{asset('/Julio.png')}}" class="img-fluid" alt="...">
          <p>Developer</p> 
       </div>
        <div class="col-md-4">
          <h3>Clemente Spoerer</h3>
          <img src="{{asset('/Clemente.png')}}" class="img-fluid" alt="...">
          <p>Developer</p>
        </div>
        <div class="col-md-4">
          <h3>David Barcia</h3>
          <img src="{{asset('/David.png')}}" class="img-fluid" alt="...">
          <p>Developer</p>
        </div>
        <div class="col-md-4">
          <h3>Gustavo Orellana</h3>
          <img src="{{asset('/Gustavo.png')}}" class="img-fluid" alt="...">
          <p>Product Owner</p>
        </div>
        <div class="col-md-4">
          <h3>Rodrigo Rivero</h3>
          <img src="{{asset('/Rodrigo.png')}}" class="img-fluid" alt="...">
          <p>Developer</p>
        </div>
      </div>

</div>
@endsection