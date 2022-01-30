@extends('store.layouts.main')

@section('content')
<div class="container text-center">
    <h1 class="title">Recumperar Senha</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group row">
            <label for="email">{{ __('E-Mail') }}</label>
                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enviar link de recumperação se senha') }}
                </button>
        </div>
    </form>
</div>
@endsection
