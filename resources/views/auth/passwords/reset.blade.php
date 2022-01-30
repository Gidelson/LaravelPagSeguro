@extends('store.layouts.main')

@section('content')
<div class="container text-center">

<h1 class="title">{{ __('Alterar Senha') }}</h1>

<div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
            <label for="email">{{ __('E-Mail') }}</label>
                <input id="email"  placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
            <label for="password">{{ __('Nova Senha') }}</label>
                <input placeholder="Senha"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
            <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
            <input placeholder="Confirmar Senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Alterar Senha') }}
            </button>
        </div>
    </form>
</div>
@endsection
