@extends('layouts.especiales')

@section('content')
<div class="container container-login">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="box" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>reset password</h1>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <input type="submit" name="" value="Reset">
    </form>

</div>
@endsection
