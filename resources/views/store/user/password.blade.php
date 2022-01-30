@extends('store.layouts.main')

@section('content')
<h1 class="title">Atualizar Senha</h1>

<form class="form form-custom" method="post" action="{{route('password.update')}}">

@csrf


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

<div class="form-group">
    <button type="submit" class="btn btn-primary">
        {{ __('Atualizar Senha') }}
    </button>
</div>
</form>
@endsection