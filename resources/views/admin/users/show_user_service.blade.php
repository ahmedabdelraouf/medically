@extends('admin.layout.base')
@section('title', $data->serviceCategory->name)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="iq-card">                                    
                <div class="iq-card-body">
                    <h5>{{trans('admin.category_service')}} : {{$data->serviceCategory->name}}</h5>
                    <h5>{{trans('admin.title')}} : {{$data->title}}</h5>
                    <h5>{{trans('admin.min_service_value')}} : {{$data->min_service_value}}</h5>
                    <h5>{{trans('admin.user')}} : {{$data->user->name}}</h5>
                    <h5>{{trans('admin.description')}}</h5>
                    <p>{{$data->description}}</p>
                </div>
            </div>
            @if($data->userVehicle != null)
            <div class="iq-card">                                    
                <div class="iq-card-body">
                    @if($data->userVehicle->car_brand_id != null)
                    <h5>{{trans('admin.car_brand')}} : @if($data->userVehicle->car_brand_id != null){{$data->userVehicle->car_brand->name}}@endif</h5>
                    @endif
                    @if($data->userVehicle->city_id != null)
                    <h5>{{trans('admin.city')}} : @if($data->userVehicle->city_id != null){{$data->userVehicle->city->name}}@endif</h5>
                    @endif
                    @if($data->userVehicle->vehicle_number != null)
                    <h5>{{trans('admin.vehicle_number')}} : {{$data->userVehicle->vehicle_number}}</h5>
                    @endif
                    @if($data->userVehicle->identity_type != null)
                    <h5>{{trans('admin.identity_type')}} : {{$data->userVehicle->identity_type}}</h5>
                    @endif
                    @if($data->userVehicle->identity_number != null)
                    <h5>{{trans('admin.identity_number')}} : {{$data->userVehicle->identity_number}}</h5>
                    @endif
                    @if($data->userVehicle->driving_license != null)
                    <h5>{{trans('admin.driving_license')}} : <img src="{{asset($data->userVehicle->driving_license)}}" style="width:50px;height:50px"></h5>
                    @endif
                    @if($data->userVehicle->car_registration_form != null)
                    <h5>{{trans('admin.car_registration_form')}} : <img src="{{asset($data->userVehicle->car_registration_form)}}" style="width:50px;height:50px"></h5>
                    @endif
                    @if($data->userVehicle->driving_license_validity != null)
                    <h5>{{trans('admin.driving_license_validity')}} : {{$data->userVehicle->driving_license_validity}}</h5>
                    @endif
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-9">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('admin.category_service')}}</th>
                                    <th>{{trans('admin.service')}}</th>
                                    <th>{{trans('admin.service_provider')}}</th>
                                    <th>{{trans('admin.from_address')}}</th>
                                    <th>{{trans('admin.to_address')}}</th>
                                    <th>{{trans('admin.from_city')}}</th>
                                    <th>{{trans('admin.to_city')}}</th>
                                    <th>{{trans('admin.date')}}</th>
                                    <th>{{trans('admin.time')}}</th>
                                    <th>{{trans('admin.price')}}</th>
                                    <th>{{trans('admin.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data->serviceRequests as $index=>$item)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->categoryService->name}}</td>
                                    <td>
                                        @if($item->service_id != null)
                                        {{$item->service->name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->service_provider_id != null)
                                        {{$item->serviceProvider->name}}
                                        @endif
                                    </td>
                                    <td>{{$item->from_address}}</td>
                                    <td>{{$item->to_address}}</td>
                                    <td>{{$item->fromCity->name}}</td>
                                    <td>{{$item->toCity->name}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->time}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
