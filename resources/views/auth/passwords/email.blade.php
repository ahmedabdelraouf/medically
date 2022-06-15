@extends('auth.auth_layout')
@section('title' , __('Reset Password'))
@section('content')
<div class="sign-in-from">
    <h1 class="mb-0">{{ __('Reset Password') }}</h1>
    @if(session()->has('status'))
        <div class="alert text-white bg-primary" role="alert">
            <div class="iq-alert-text">
                {{session()->get('status')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            x
            </button>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert text-white bg-danger" role="alert">
            <div class="iq-alert-text">
                {{session()->get('error')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            x
            </button>
        </div>
    @endif
    <form method="POST" class="mt-4" action="{{ route('password.email' ) }}">
        @csrf
        <div class="form-group ">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-inline-block w-100">
            <button type="submit" class="btn btn-primary float-right">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
</div>
@endsection
