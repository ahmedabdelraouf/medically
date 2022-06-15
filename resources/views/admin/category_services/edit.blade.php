@extends('admin.layout.base')
@section('title', trans('admin.edit_category_service'))
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> {{trans('admin.edit_category_service')}} </h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if(!empty($category_service->image))
                                    <img class="profile-pic"
                                         src="{{ asset($category_service->image) }}"
                                         alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid"
                                         src="{{ asset('assets/plugins/vito/images/user/11.png') }}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">{{trans('admin.image')}}</a>
                                    <input name="image" class="file-upload" form="edit-damage-form" type="file"
                                           accept="image/*">
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
                        <h4 class="card-title"> {{trans('admin.category_service_info')}}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @include('admin.include.messages')
                    @include('admin.include.messages_errors')
                    <div class="new-user-info">
                        {!! Form::open(['method'=>'put' ,'id'=>'edit-damage-form', 'route'=>['category-service.update' , $category_service->id] ,'enctype'=>'multipart/form-data']) !!}
                        <div class="row">
                            @method('put')
                            @foreach(\App\Helpers\LanguageHelper::getArrLang() as $lang)
                                <div class="form-group col-md-8">
                                    {!! Form::label('name_'.$lang , trans('admin.name_'.$lang)) !!}
                                    {!! Form::text("name[$lang]" ,old('name'.$lang) ?? $category_service->toArray()['name']["$lang"],
                                        ['class'=>'form-control' ,'required'=>'required', 'id'=>'name_'.$lang ,
                                        'placeholder'=>trans('admin.name_'.$lang)]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('description_'.$lang , trans('admin.description_'.$lang)) !!}
                                    {!! Form::textarea("description[$lang]" , old('name'.$lang) ?? $category_service->toArray()['description']["$lang"],
                                        ['class'=>'form-control' ,'required'=>'required','rows'=>5,
                                        'id'=>'description_'.$lang , 'placeholder'=>trans('admin.description_'.$lang)]) !!}
                                </div>
                            @endforeach
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
