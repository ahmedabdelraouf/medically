@extends('admin.layout.base')

@section('title', trans('admin.add_category_service'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> {{trans('admin.city_info')}}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @include('admin.include.messages')
                    @include('admin.include.messages_errors')
                    <div class="new-user-info">
                        {!! Form::open(['method'=>'post' , 'route'=>['cities.store'] ,'enctype'=>'multipart/form-data' , 'id'=>'add-category_service-form']) !!}
                        <div class="row">
                            @method('POST')
                            @foreach(\App\Helpers\LanguageHelper::getArrLang() as $lang)
                                <div class="form-group col-md-8">
                                    {!! Form::label('name_'.$lang , trans('admin.name_'.$lang)) !!}
                                    {!! Form::text("name[$lang]" ,old('name'.$lang) ,
                                        ['class'=>'form-control' ,'required'=>'required', 'id'=>'name_'.$lang ,
                                        'placeholder'=>trans('admin.name_'.$lang)]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('description_'.$lang , trans('admin.description_'.$lang)) !!}
                                    {!! Form::textarea("description[$lang]" , old("description_".$lang) ,
                                        ['class'=>'form-control' ,'required'=>'required','rows'=>5,
                                        'id'=>'description_'.$lang , 'placeholder'=>trans('admin.description_'.$lang)]) !!}
                                </div>
                            @endforeach

                            <div class="col-md-6 form-group">
                                {!! Form::label('address-input' , trans('admin.address ')) !!}
                                {!! Form::text('address' , old('address') , ['id'=>'address-input' , 'autocomplete'=>'off' , 'class'=>'form-control map-input' , 'placeholder'=>trans('admin.address ')] ) !!}
                                {!! Form::hidden('lat' , old('lat') ?? "0" , ['id'=>'address-latitude'] ) !!}
                                {!! Form::hidden('lng' , old('lng') ?? "0" , ['id'=>'address-longitude'] ) !!}
                            </div>
                            <div id="address-map-container" class="col-md-12 mb-3" style="height:400px;  ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
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
