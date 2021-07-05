@extends('welcome')



@section('content')

<div class="col text-center">

    <a class="btn btn-outline-primary" style="margin-top: 120px;" href="/home/escaner"> Subir </a>
    <a class="btn btn-outline-primary" style="margin-top: 120px;" href="{{ route('ListarArchivos') }}"> Subir </a>

</div>
@endsection