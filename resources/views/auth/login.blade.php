@extends('auth.auth_layout')
@section('title' , trans('admin.Login'))
@section('content')
    <div class="sign-in-from">
        <h1 class="mb-0">{{trans('admin.Login')}}</h1>
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
        {!! Form::open(['method'=>'post' , 'route'=>['login' ] , 'class'=>'mt-4']) !!}
        <div class="form-group">
            {!! Form::label('email' , trans('admin.email')) !!}
            {!! Form::text('email' , old('email') , ['class'=>'form-control mb-0' ,'value'=>'adminAhmed@medical_egy.com' , 'placeholder'=>trans('admin.email'), 'id'=>'email' , 'autofocus'=>'autofocus' , 'required'=>'required']) !!}
            @error('phone')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('password' , trans('admin.Password')) !!}
            @if (Route::has('password.request'))
                <a class="float-right" href="{{route('password.request')}}">
                    {{trans('admin.Forgot_Your_Password?')}}
                </a>
            @endif
            {!! Form::password('password' , ['class'=>'form-control mb-0'  ,'value'=>'password' , 'placeholder'=>trans('admin.Password'), 'id'=>'Password' , 'required'=>'required']) !!}
            @error('password')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="d-inline-block w-100">
            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember"
                       class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">{{trans('admin.Remember_Me')}}</label>
            </div>
            {!! Form::submit(trans('admin.Login') , ['class'=>'btn btn-primary float-right']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
