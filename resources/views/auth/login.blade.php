@extends('store.layouts.main')

@section('content')
<div class="container text-center">
    <h1 class="title">Login</h1>
<form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email">{{ __('E-Mail') }}</label>

           
                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>

        <div class="form-group row">
            <label for="password">{{ __('Senha') }}</label>
                <input  placeholder="Senha"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Recumoperar Senha ?') }}
                    </a>
                @endif
                /
                 <a class="btn btn-link" href="{{ route('register') }}">
                     {{ __('Cadastre-se') }}
                </a>

        </div>
</form>
</div>
@endsection
