
@extends('welcome')


@section('content')
<body>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-success">Usuario bloqueado durante 1 minuto</div>';;
    }
    ?>
    <form action="{{route('intentos')}}" method="post">
        @csrf
        <input type="email" name="email" placeholder="email" value="{{old('email')}}">
        <input type="password" name="password" placeholder="••••••••••" value="{{old('password')}}">
        <button class="btn btn-primary btn-block">
            Enviar

        </button>

    </form>
</body>
@endsection