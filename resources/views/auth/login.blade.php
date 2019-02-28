@extends('layouts.especiales')

@section('content')
<div class="container container-login">

    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>pordede.com</h1>

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label form-check-label-login" for="remember"> {{ __('Recuérdame') }} </label>

        <input type="submit" name="" value="Login">

        <a href="login/github" class="btn btn-outline-dark" type="button" name="button">Login with Github</a>

        <div style="text-align: right;">
          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                  {{ __('Has olvidado tu contraseña?') }}
              </a><br>
          @endif
          <a href="{{ route('register') }}">Regístrate ahora</a>
        </div>
    </form>

</div>
@endsection
