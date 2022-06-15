@extends('admin.layout.base')
@section('title', __('admin.allbuildings'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">
                            {{__('admin.allbuildings')}}
                        </h4>
                    </div>
                </div>
                <a href="{{route('allbuildings.create',[app()->getLocale()])}}"
                    class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip"
                    title="{{trans('admin.add-building')}}">
                    <i class="fa fa-plus"></i>
                </a>
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
                            <th>{{trans('admin.type')}}</th>
                            <th>{{trans('admin.residential_unit_number')}}</th>
                            <th>{{trans('admin.bed_rooms')}}</th>
                            <th>{{trans('admin.bed_rooms')}}</th>
                            <th>{{trans('admin.address ')}}</th>
                            <th>{{trans('admin.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buildings as $index=>$item)
                            <tr>
                                <td>{{$index += 1}}</td>
                                <td>{{$item->buildingType->name}}</td>
                                <td>{{$item->residential_unit_number}}</td>
                                <td>{{$item->bath_rooms}}</td>
                                <td>{{$item->bed_rooms}}</td>
                                <td>{{$item->address}}</td>
                                <td class="text-center">
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top"
                                            title="{{trans('admin.edit')}}" data-original-title="Edit"
                                            href="{{route('allbuildings.edit' ,[ $item->id])}}">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        {!! Form::open(['method'=>'delete' , 'route'=>['allbuildings.destroy' , [$item->id]] , 'class'=>'d-inline']) !!}
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
