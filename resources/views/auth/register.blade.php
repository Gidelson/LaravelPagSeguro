@extends('store.layouts.main')

@section('content')
<div class="container text-center">
    <h1 class="title">Cadastre-se</h1>
<form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Dados Pessoais</h3>
        <div class="form-group row">
            <label for="name">{{ __('Nome') }}</label>
            <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="email">{{ __('E-Mail') }}</label>
            <input id="email" placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="password">{{ __('Senha') }}</label>
                <input id="password"  placeholder="Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
            <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                <input id="password-confirm" placeholder="Senha" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>


        <div class="form-group row">
            <label for="cpf">{{ __('cpf') }}</label>
            <input id="cpf" placeholder="cpf"  type="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf">
            @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="street">{{ __('Rua') }}</label>
            <input id="street" placeholder="Rua"  type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">
            @error('street')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="number">{{ __('Número') }}</label>
            <input id="number" placeholder="Número"  type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">
            @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="complement">{{ __('Complemento') }}</label>
            <input id="complement" placeholder="Complemento"  type="text" class="form-control @error('complement') is-invalid @enderror" name="complement" value="{{ old('complement') }}" required autocomplete="complement">
            @error('complement')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="district">{{ __('Distrito') }}</label>
            <input id="district" placeholder="Distrito"  type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" required autocomplete="district">
            @error('district')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="postal_code">{{ __('Código Postal') }}</label>
            <input id="postal_code" placeholder="Código Postal"  type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code">
            @error('postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="city">{{ __('Cidade') }}</label>
            <input id="city" placeholder="Cidade"  type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="state">{{ __('Estado') }}</label>
            <input id="state" placeholder="Estado"  type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state">
            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="country">{{ __('País') }}</label>
            <input id="country" placeholder="País"  type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">
            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="phone">{{ __('Telefone') }}</label>
            <input id="phone" placeholder="Telefone"  type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="area_code">{{ __('Código de área') }}</label>
            <input id="area_code" placeholder="Codigo de área"  type="number" class="form-control @error('area_code') is-invalid @enderror" name="area_code" value="{{ old('area_code') }}" required autocomplete="area_code">
            @error('area_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="birth_date">{{ __('Data De Nascimento') }}</label>
            <input id="birth_date" placeholder="Data de Nascimento"  type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">
            @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrar') }}
            </button>
        </div>
 </form>
</div>
@endsection
