@extends('layouts.app')

@section('content')

<div class="container" style="min-height: 92vh;">
	<h1 class="logo">Osadnicy</h1>
	<p class="text-center">
		Rozbuduj swoją osadę i rywalizuj z innymi graczami pnąc się
		po szczeblach rankingu.
	</p>

	<div class="text-light row justify-content-center">
	    <div class="main-div col-12 col-md-8 bg-primary text-center">
	        <form method="POST" action="{{ route('login') }}">
				@csrf
		        <div class="form-group row">
					<label for="name"
					class="col-md-4 col-form-label text-md-right">
						<i class="fa fa-at"></i>
					</label>

					<div class="col-md-6 login-form">
						<input id="email"
						type="email"
						placeholder="E-mail"
						class="form-control @error('email') is-invalid @enderror
						col-8"
						name="email"
						value="{{ old('email') }}"
						required autocomplete="email"
						autofocus>

						@error('email')
							<span class="invalid-feedback text-left mt-3" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

				</div>

		        <div class="form-group row">
					<label for="name"
					class="col-md-4 col-form-label text-md-right">
						<i class="fa fa-lock"></i>
					</label>

					<div class="col-md-6 login-form">
						<input id="password"
						type="password"
						placeholder="Hasło"
						class="form-control @error('password') is-invalid @enderror
						col-8"
						name="password"
						required autocomplete="current-password">

						@error('password')
							<span class="invalid-feedback text-left" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

		        <p>
					<i class="glyphicon glyphicon-log-in"
					style="position:relative; top:8px; margin-right:5px;"></i>
					<button type="submit" class="btn btn-primary">
						{{ __('Zaloguj się') }}
					</button>
				</p>
				<p>
					@if (Route::has('password.request'))
						<a class=""
						href="{{ route('password.request') }}">
							{{ __('Zapomniałeś hasła?') }}
						</a>
					@endif
				</p>
	        </form>
	        <p>
				<i class="fa fa-user-plus" style="font-size:24px"></i>
				<a href="/register">Rejestracja - załóż darmowe konto</a>
			</p>
	    </div>
	</div>
</div>

@endsection
