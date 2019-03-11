@extends('layouts.especiales')

@section('content')
<div class="container container-login">

    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>blockbuster</h1>

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

        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="custom-control-label form-check-label-login" for="remember"> {{ __('Recuérdame') }} </label>
        </div>
        <input type="submit" name="" value="Login">

        <a href="{{ url('/login/github') }}" class="btn botoLoginGithub" role="button"><i class="fab fa-github"></i> Github</a>
        <a href="{{ url('/login/twitter') }}" class="btn botoLoginTwitter" role="button"><i class="fab fa-twitter"></i> Twitter</a>
        <!-- No funciona -->
        <!-- <a href="{{ url('/login/google') }}" class="btn botoLoginGoogle" role="button"><i class="fab fa-google"></i> Google</a> -->

        <div style="text-align: right;">
          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="links-login">
                  {{ __('Has olvidado tu contraseña?') }}
              </a><br>
          @endif
          <a href="{{ route('register') }}" class="links-login">Regístrate ahora</a>
        </div>
    </form>

</div>
@endsection
