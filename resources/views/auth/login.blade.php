@extends('layouts.app')
@section('title','Вход')

@section('content')
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 mb-5">
                <h2 class="text-center mb-3">{{ __('message.login') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="form-group mt-2 col-6 mx-auto">
                            <label for="email" class="col-form-label ">{{ __('message.el') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group mt-2 col-6 mx-auto">
                            <label for="password" class=" col-form-label ">{{ __('message.pas') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4 mx-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('message.remember') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0 ">
                        <div class="col-md-6 offset-md-4 mx-auto">
                            <button type="submit" class="btn btn-primary col-4">
                                {{ __('message.login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Вы забыли пароль?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
