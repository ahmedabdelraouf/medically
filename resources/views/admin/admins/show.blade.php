@extends('admin.layout.base')
@section('title', $admin->name)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="iq-card">
                <div class="iq-card-body text-center">
                    @if(!empty($admin->image))
                        <img class="img-fluid" src="{{asset('storage/'.$admin->image)}}"/>
                    @else
                        <img class="img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}"/>
                    @endif
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <h5>{{trans('admin.client')}} : {{$admin->name}}</h5>
                    <h5>{{trans('admin.phone')}} : {{$admin->phone}}</h5>
                    <h5>{{trans('admin.email')}} : {{$admin->email}}</h5>
                    <h5>{{trans('admin.type')}} : {{$admin->gender}}</h5>
                    @if($rate != null)
                    <h5>{{trans('admin.rate')}} : {{$rate}}</h5>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills d-flex align-items-end profile-feed-items p-0 m-0">
                        <li>
                            <a class="nav-link active" data-toggle="pill" href="#userServices">{{__('admin.userServices')}}</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#ServicesRequests">{{__('admin.ServicesRequests')}}</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#UserVehicle">{{__('admin.UserVehicle')}}</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#UserReviews">{{__('admin.Reviews')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="userServices">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('admin.category_service')}}</th>
                                    <th>{{trans('admin.title')}}</th>
                                    <th>{{trans('admin.min_service_value')}}</th>
                                    <th>{{trans('admin.description')}}</th>
                                    <th>{{trans('admin.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userServices as $index=>$item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->serviceCategory->name}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->min_service_value}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="text-center">
                                            <div class="flex align-items-center list-user-action">
                                                <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="{{trans('admin.show')}}" data-original-title="show" href="{{route('user_services.show' ,[ $item->id])}}">
                                                    <i class="ri-slideshow-3-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ServicesRequests">
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
                                    @foreach($serviceRequests as $index=>$item)
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
                <div class="tab-pane fade" id="UserVehicle">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.car_brand')}}</th>
                                            <th>{{trans('admin.city')}}</th>
                                            {{-- <th>{{trans('admin.userService')}}</th> --}}
                                            <th>{{trans('admin.vehicle_number')}}</th>
                                            <th>{{trans('admin.identity_type')}}</th>
                                            <th>{{trans('admin.identity_number')}}</th>
                                            <th>{{trans('admin.driving_license')}}</th>
                                            <th>{{trans('admin.car_registration_form')}}</th>
                                            <th>{{trans('admin.driving_license_validity')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userVehicles as $index=>$item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>
                                                @if($item->car_brand_id != null)
                                                {{$item->car_brand->name}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->city_id != null)
                                                {{$item->city->name}}
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if($item->user_service_id != null)
                                                {{$item->service->id}}
                                                @endif
                                            </td> --}}
                                            <td>{{$item->vehicle_number}}</td>
                                            <td>{{$item->identity_type}}</td>
                                            <td>{{$item->identity_number}}</td>
                                            <td>
                                                @if($item->driving_license != null)
                                                <img src="{{asset($item->driving_license)}}" style="width:50px;height:50px">
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->car_registration_form != null)
                                                <img src="{{asset($item->car_registration_form)}}"  style="width:50px;height:50px">
                                                @endif
                                            </td>
                                            <td>{{$item->driving_license_validity}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="UserReviews">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.message')}}</th>
                                            <th>{{trans('admin.rate')}}</th>
                                            <th>{{trans('admin.date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $index=>$item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$item->review}}</td>
                                            <td>{{$item->rate}}</td>
                                            <td>{{date('d-m-Y' , strToTime($item->created_at))}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
