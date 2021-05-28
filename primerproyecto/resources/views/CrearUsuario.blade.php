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
