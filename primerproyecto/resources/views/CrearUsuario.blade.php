@extends('welcome')

@section('content')
@if (session()->has('exito'))

    {{session()->get('exito')}}
@endif
<div class="main-w3layouts wrapper">
		<h1>Mete info</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{route('guardarUs')}}" method="post">
                    @csrf
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cargo">
                            <option selected>Posicion</option>
                            <option value="Secretario">Secretario</option>
                            <option value="Trabajador de planta">Trabajador de planta</option>
                            <option value="Practicante">Practicante</option>
                    </select>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
			</div>
		</div>
	</div>
@endsection
