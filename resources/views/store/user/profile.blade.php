@extends('store.layouts.main')

@section('content')
<h1 class="title">Meu Perfil</h1>

<form class="form form-custom" method="post" action="{{route('profile.update')}}">


@csrf

        <h3>Dados Pessoais</h3>
        <div class="form-group row">
            <label for="name">{{ __('Nome') }}</label>
            <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="email">{{ __('E-Mail') }}</label>
            <input id="email" placeholder="Email" disabled="disabled" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}"  autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="cpf">{{ __('cpf') }}</label>
            <input id="cpf"  disabled="disabled" placeholder="cpf"  type="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ auth()->user()->cpf }}"  autocomplete="cpf">
            @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="street">{{ __('Rua') }}</label>
            <input id="street" placeholder="Rua"  type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ auth()->user()->street }}" required autocomplete="street">
            @error('street')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="number">{{ __('Número') }}</label>
            <input id="number" placeholder="Número"  type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{auth()->user()->number }}" required autocomplete="number">
            @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="complement">{{ __('Complemento') }}</label>
            <input id="complement" placeholder="complement"  type="text" class="form-control @error('complement') is-invalid @enderror" name="complement" value="{{ auth()->user()->complement }}" required autocomplete="complement">
            @error('complement')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="district">{{ __('Distrito') }}</label>
            <input id="district" placeholder="Distrito"  type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ auth()->user()->district }}" required autocomplete="district">
            @error('district')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="postal_code">{{ __('Código Postal') }}</label>
            <input id="postal_code" placeholder="Código Postal"  type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{auth()->user()->postal_code }}" required autocomplete="postal_code">
            @error('postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="city">{{ __('Cidade') }}</label>
            <input id="city" placeholder="Cidade"  type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ auth()->user()->city }}" required autocomplete="city">
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="state">{{ __('Estado') }}</label>
            <input id="state" placeholder="Estado"  type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ auth()->user()->state }}" required autocomplete="state">
            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="country">{{ __('País') }}</label>
            <input id="country" placeholder="País"  type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{auth()->user()->country }}" required autocomplete="country">
            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="phone">{{ __('Telefone') }}</label>
            <input id="phone" placeholder="Telefone"  type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{auth()->user()->phone }}" required autocomplete="phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="area_code">{{ __('Código de área') }}</label>
            <input id="area_code" placeholder="Codigo de área"  type="number" class="form-control @error('area_code') is-invalid @enderror" name="area_code" value="{{ auth()->user()->area_code }}" required autocomplete="area_code">
            @error('area_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="birth_date">{{ __('Data') }}</label>
            <input id="birth_date" placeholder="Data"  type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ auth()->user()->birth_date }}" required autocomplete="birth_date">
            @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Atualizar Perfil') }}
            </button>
        </div>
</form>
@endsection