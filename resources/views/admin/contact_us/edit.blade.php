@extends('admin.layout.base')

@section('title', trans('admin.edit-contract_types'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> {{trans('admin.contract_types-info')}}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @include('admin.include.messages_errors')
                    <div class="new-user-info">
                        {{--'route'=>['contact_us.update'  , $contactUs->id] ,--}}
                        {!! Form::open(['method'=>'put' , 'enctype'=>'multipart/form-data']) !!}
                        <div class="row">
                            @method('PUT')
                            <div class="form-group col-md-6">
                                {!! Form::label('name' , trans('admin.name')) !!}
                                {{$contactUs->name}}
                                {!! Form::text('name' , old('name') ?? $contactUs->name ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name_ar' , 'placeholder'=>trans('admin.name')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('phone' , trans('admin.phone')) !!}
                                {!! Form::text('phone' , old('phone') ?? $contactUs->phone ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name_en' , 'placeholder'=>trans('admin.phone')]) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('message' , trans('admin.message')) !!}
                                {!! Form::textarea('message' , old('message') ?? $contactUs->message ,['class'=>'form-control' ,'required'=>'required', 'id'=>'description_ar' , 'placeholder'=>trans('admin.message') , "rows"=>3]) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::Label('status' , trans('admin.status')) !!}
                                {!! Form::checkbox('status' , old('status') ?? $contactUs->status ,['class'=>'form-control' ,'required'=>'required', 'id'=>'description_en' , 'placeholder'=>trans('admin.status') , "rows"=>3]) !!}
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
