@extends('admin.layout.base')

@section('title', $data->name)

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if(!empty($data->image))
                                    <img class="profile-pic img-fluid" src="{{ asset('storage'.$data->image) }}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{ asset('assets/plugins/vito/images/user/11.png') }}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">{{trans('admin.image')}}</a>
                                    <input name="image" class="file-upload" form="edit-admin-form" type="file" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="iq-card">
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
                        {!! Form::open(['method'=>'put' , 'route'=>['admins.update' , $data->id] ,'enctype'=>'multipart/form-data'  , 'id'=>'edit-admin-form']) !!}
                        <div class="row">
                            @method('PUT')
                            <div class="form-group col-md-6">
                                {!! Form::label('name' , trans('admin.name')) !!}
                                {!! Form::hidden('type' , 'admin') !!}
                                {!! Form::hidden('id' , $data->id) !!}
                                {!! Form::text('name' , old('name') ?? $data->name ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name' , 'placeholder'=>trans('admin.name')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('phone' , trans('admin.phone')) !!}
                                {!! Form::text('phone' , old('phone') ?? $data->phone ,['class'=>'form-control' ,'required'=>'required', 'id'=>'phone' , 'placeholder'=>trans('admin.phone')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('email' , trans('admin.email')) !!}
                                {!! Form::email('email' , old('email') ?? $data->email ,['class'=>'form-control' , 'id'=>'email' , 'placeholder'=>trans('admin.email')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('gender' , trans('admin.gender')) !!}
                                {!! Form::select('gender' ,['male'=>trans('admin.male') , 'female'=>trans('admin.female')], old('gender') ?? $data->gender ,['class'=>'form-control' ,'required'=>'required', 'id'=>'gender' , 'placeholder'=>trans('admin.gender')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('old-password' , trans('admin.old-password')) !!}
                                {!! Form::password('old_password' ,['class'=>'form-control', 'id'=>'old-password' , 'autocomplete'=>'new-password' ,  'placeholder'=>trans('admin.old-password')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('password' , trans('admin.password')) !!}
                                {!! Form::password('password' ,['class'=>'form-control', 'id'=>'password' , 'autocomplete'=>'new-password' ,  'placeholder'=>trans('admin.password')]) !!}
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
