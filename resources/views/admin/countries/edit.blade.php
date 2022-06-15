@extends('admin.layout.base')
@section('title', trans('admin.edit_country'))
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">{{ trans('admin.edit_country_info') }}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @include('admin.include.messages')
                    @include('admin.include.messages_errors')
                    <div class="new-user-info">
                        {!! Form::open(['method' => 'PUT', 'id' => 'edit-damage-form', 'route' => ['countries.update' , $country->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            @method('put')
                            @foreach(\App\Helpers\LanguageHelper::getArrLang() as $lang)
                                <div class="form-group col-md-8">
                                    {!! Form::label('name_' . $lang, trans('admin.name_' . $lang)) !!}
                                    {!! Form::text("name[$lang]", old('name.' . $lang) ?? $country->toArray()['name']["$lang"],
                                        ['class' => 'form-control', 'required' => 'required', 'id' => 'name_' . $lang ,
                                        'placeholder' => trans('admin.name_' . $lang)]) !!}
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                {!! Form::submit(trans('admin.save') , ['class' => 'btn btn-primary ml-2 pull-left']) !!}
                                {!! Form::reset(trans('admin.cancel') , ['class' => 'btn btn-secondary pull-left']) !!}
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
