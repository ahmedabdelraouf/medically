@extends('admin.layout.base')

@section('title', trans('admin.edit-user'))

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> {{trans('admin.edit-user')}} </h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if(!empty($user->image))
                                    <img class="profile-pic img-fluid" src="{{ asset('storage/'.$user->image) }}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{ asset('assets/plugins/vito/images/user/11.png') }}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">{{trans('admin.image')}}</a>
                                    <input name="image" class="file-upload" form="edit-user-form" type="file" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> {{trans('admin.user-info')}}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if(session()->has('error'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{{session()->get('error')}}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    @include('admin.include.messages_errors')
                    <div class="new-user-info">
                        {!! Form::open(['method'=>'put' , 'route'=>['users.update'  , $user->id] ,'enctype'=>'multipart/form-data'  , 'id'=>'edit-user-form']) !!}
                        <div class="row">
                            @method('PUT')
                            <div class="form-group col-md-6">
                                {!! Form::label('name' , trans('admin.name')) !!}
                                {!! Form::hidden('type' , 'user') !!}
                                {!! Form::hidden('id' , $user->id) !!}
                                {!! Form::text('name' , old('name') ?? $user->name ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name' , 'placeholder'=>trans('admin.name')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('phone' , trans('admin.phone')) !!}
                                {!! Form::text('phone' , old('phone') ?? $user->phone ,['class'=>'form-control' ,'required'=>'required', 'id'=>'phone' , 'placeholder'=>trans('admin.phone')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('email' , trans('admin.email')) !!}
                                {!! Form::email('email' , old('email') ?? $user->email ,['class'=>'form-control' , 'id'=>'email' , 'placeholder'=>trans('admin.email')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('gender' , trans('admin.gender')) !!}
                                {!! Form::select('gender' ,['male'=>trans('admin.male') , 'female'=>trans('admin.female')], old('gender') ?? $user->gender ,['class'=>'form-control' ,'required'=>'required', 'id'=>'gender' , 'placeholder'=>trans('admin.gender')]) !!}
                            </div>

                            <div class="form-group col-md-6">
                                {!! Form::label('password' , trans('admin.password')) !!}
                                {!! Form::password('password' ,['class'=>'form-control' , 'id'=>'password' , 'autocomplete'=>'new-password' ,  'placeholder'=>trans('admin.password')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('con-password' , trans('admin.con-password')) !!}
                                {!! Form::password('password_confirmation' ,['class'=>'form-control' , 'id'=>'con-password' ,'autocomplete'=>'new-password', 'placeholder'=>trans('admin.con-password')]) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::submit(trans('admin.save') , ['class'=>'btn btn-primary ml-2 pull-left']) !!}
                                {!! Form::reset(trans('admin.cancel') , ['class'=>'btn btn-secondary pull-left']) !!}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
