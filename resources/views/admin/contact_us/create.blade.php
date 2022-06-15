@extends('admin.layout.base')

@section('title', trans('admin.add-contract_types'))

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
                        {!! Form::open(['method'=>'post' , 'route'=>['contracttypes.store' ] ,'enctype'=>'multipart/form-data']) !!}
                        <div class="row">
                            @method('POST')
                            <div class="form-group col-md-6">
                                {!! Form::label('name_ar' , trans('admin.name_ar')) !!}
                                {!! Form::text('name_ar' , old('name_ar') ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name_ar' , 'placeholder'=>trans('admin.name_ar')]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('name_en' , trans('admin.name_en')) !!}
                                {!! Form::text('name_en' , old('name_en') ,['class'=>'form-control' ,'required'=>'required', 'id'=>'name_en' , 'placeholder'=>trans('admin.name_en')]) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description_ar' , trans('admin.description_ar')) !!}
                                {!! Form::textarea('description_ar' , old('description_ar') ,['class'=>'form-control' ,'required'=>'required', 'id'=>'description_ar' , 'placeholder'=>trans('admin.description_ar') , "rows"=>3]) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description_en' , trans('admin.description_en')) !!}
                                {!! Form::textarea('description_en' , old('description_en') ,['class'=>'form-control' ,'required'=>'required', 'id'=>'description_en' , 'placeholder'=>trans('admin.description_en') , "rows"=>3]) !!}
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
