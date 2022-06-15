@extends('admin.layout.base')
@section('title', __('admin.show'))
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="iq-card">
                <div class="iq-card-body">
                    <h5>{{trans('admin.name')}} : {{$buildingtype->name}}</h5>
                    <h5>{{trans('admin.description')}} </h5>
                    <p>{{$buildingtype->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">
                            {{__('admin.allbuildings')}}
                        </h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if(session()->has('success'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{{session()->get('success')}}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('admin.client')}}</th>
                            <th>{{trans('admin.residential_unit_number')}}</th>
                            <th>{{trans('admin.bath_rooms')}}</th>
                            <th>{{trans('admin.bed_rooms')}}</th>
                            <th>{{trans('admin.address ')}}</th>
                            <th>{{trans('admin.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buildingtype->buildings as $index=>$item)
                            <tr>
                                <td>{{$index += 1}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->residential_unit_number}}</td>
                                <td>{{$item->bath_rooms}}</td>
                                <td>{{$item->bed_rooms}}</td>
                                <td>{{$item->address}}</td>
                                <td class="text-center">
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top"
                                            title="{{trans('admin.edit')}}" data-original-title="Edit"
                                            href="{{route('allbuildings.edit' ,[app()->getLocale(), $item->id])}}">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top"
                                            title="{{trans('admin.show')}}" data-original-title="show"
                                            href="{{route('allbuildings.show' ,[app()->getLocale(), $item->id])}}">
                                            <i class="ri-slideshow-3-line"></i>
                                        </a>
                                        {!! Form::open(['method'=>'delete' , 'route'=>['allbuildings.destroy' , [app()->getLocale(), $item->id]] , 'class'=>'d-inline']) !!}
                                        <button type="submit" class="iq-bg-primary border-0" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="{{trans('admin.delete')}}">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
