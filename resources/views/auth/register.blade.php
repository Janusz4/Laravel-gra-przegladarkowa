@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 92vh;">

    <h1 class="logo">Osadnicy</h1>
    <h3 class="text-center">Rejestracja</h3>

    <div class="text-light row justify-content-center">
        <div class="rejstracja col-12 col-md-8 bg-primary text-center">

          <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="row mb-2">
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                      <i class="fa fa-user"></i>
                  </div>
                  <div class="col-md-6">
                    <input id="name"
                    type="text"
                    placeholder="Nazwa użytkownika"
                    class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}"
                    required autocomplete="name"
                    autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <i class="fa fa-at"></i>
                </div>
                <div class="col-md-6">
                    <input id="email"
                    type="email"
                    placeholder="E-mail"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="col-md-6">
                    <input id="password"
                    type="password"
                    placeholder="Hasło"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="col-md-6">
                    <input id="password-confirm"
                    type="password"
                    placeholder="Powtórz hasło"
                    class="form-control"
                    name="password_confirmation"
                    required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Zarejestruj się') }}
            </button>

          </form>

      </div>
  </div>
</div>
@endsection
