@extends('admin.layout.base')
@section('title' , 'dashboard')
@section('content')

        <div class="container-fluid">

            <div class="iq-customer-box d-flex align-items-center justify-content-between mt-12">
                <div class="d-flex align-items-center">
                    <img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/>
                    <h2>{{trans('admin.users_statistics')}}</h2></div>
                <div class="iq-map text-info font-size-32">
                </div>
            </div>

            <br>
            <div class="row">
                @foreach($usersStatistics as $index=>$userData)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>{{ trans('admin.'.$index) }}</h6>
                                    <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                </div>
                                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                        <h2>{{ $userData }}</h2></div>
                                    <div class="iq-map text-info font-size-32"><i style="    color: #960505;" class="ri-bar-chart-grouped-line"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h3>{{trans('admin.service_requests_statistics')}}</h3>
            <br>
            <div class="row">
                @foreach($serviceRequestsStatistics as $serviceRequestsStatisticsItem)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>{{ $serviceRequestsStatisticsItem->status }}</h6>
                                    <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                </div>
                                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><i style="color: #96050f;" class="ri-refund-line"></i></div>
                                        <h2>{{ $serviceRequestsStatisticsItem->count }}</h2></div>
                                    <div class="iq-map text-info font-size-32"><i style="    color: #960505;" class="ri-bar-chart-grouped-line"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class=""row>
                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-12">
                    <div class="d-flex align-items-center">
                        {{--                    <img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/>--}}
                        <h2>{{trans('admin.contact_us')}}</h2>
                    </div>
                    <div class="iq-map text-info font-size-32">
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach($contactUsStatistics as $index=>$userData)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ trans('admin.'.$index) }}</h6>
                                        <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                    </div>
                                    <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                            <h2>{{ $userData }}</h2></div>
                                        <div class="iq-map text-info font-size-32"><i style="    color: #960505;"class="ri-bar-chart-grouped-line"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-12">
                    <div class="d-flex align-items-center">
                        {{--                    <img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/>--}}
                        <h2>{{trans('admin.user_vehicles_statistics')}}</h2>
                    </div>
                    <div class="iq-map text-info font-size-32">
                    </div>
                </div>
                <br>

                <div class="row">
                    @foreach($userVehicleServiceStatistics as $index=>$userData)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ trans('admin.'.$index) }}</h6>
                                        <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                    </div>
                                    <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                            <h2>{{ $userData }}</h2></div>
                                        <div class="iq-map text-info font-size-32"><i style="    color: #960505;"class="ri-bar-chart-grouped-line"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-12">
                    <div class="d-flex align-items-center">
                        <h2>{{trans('admin.transaction_statistics')}}</h2>
                    </div>
                    <div class="iq-map text-info font-size-32">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>{{ trans('admin.total_payments') }}</h6>
                                    <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                </div>
                                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                        <h2>{{ $transactionStatistics->total_payments ?? 0 }}</h2>
                                    </div>
                                    <div class="iq-map text-info font-size-32"><i style="    color: #960505;" class="ri-bar-chart-grouped-line"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>{{ trans('admin.total_transactions') }}</h6>
                                    <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                </div>
                                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                        <h2>{{ $transactionStatistics->total_transactions ?? 0 }}</h2>
                                    </div>
                                    <div class="iq-map text-info font-size-32"><i style="    color: #960505;" class="ri-bar-chart-grouped-line"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>{{ trans('admin.top_service_provider') }}</h6>
                                    <span class="iq-icon"><i class="ri-information-fill"></i></span>
                                </div>
                                <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/></div>
                                        <h2>{{ $transactionStatistics->serviceProvider->name ?? '--' }}</h2>
                                    </div>
                                    <div class="iq-map text-info font-size-32"><i style="    color: #960505;" class="ri-bar-chart-grouped-line"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>x
                </div>
            </div>
        </div>
    </div>

@endsection
