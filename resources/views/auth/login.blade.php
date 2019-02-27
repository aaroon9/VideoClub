@extends('layouts.especiales')

@section('content')
<div class="container container-login">
  <h3 style="text-align: center; margin-bottom: 1em; font-family: 'Condiment', cursive; font-size: 3em;">pordede.com</h3>
            
    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf
        <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label> -->

        <!-- Autofocus, class i name necessaris? -->
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label> -->

        <!-- Class i name necessaris? -->
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <!-- <label class="form-check-label" for="remember"> {{ __('Recuérdame') }} </label> -->

        <!-- Aixo hauria d'anar aqui: <input type="submit" name="" value="Login"> -->
        <button type="submit" class="btn btn-primary"> {{ __('Login') }} </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" style="align" href="{{ route('password.request') }}">
                {{ __('Has olvidado tu contraseña?') }}
            </a>
        @endif

        <div class="col-md-8 offset-md-4"><a href="{{ route('register') }}">Regístrate ahora</a></div>
    </form>
              
</div>
@endsection
