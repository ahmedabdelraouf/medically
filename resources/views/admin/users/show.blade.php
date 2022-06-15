@extends('admin.layout.base')
@section('title', $user->name)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="iq-card">
                <div class="iq-card-body text-center">
                    @if(!empty($user->image))
                        <img class="img-fluid" src="{{asset('storage/'.$user->image)}}"/>
                    @else
                        <img class="img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}"/>
                    @endif
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <h5>{{trans('admin.client')}} : {{$user->name}}</h5>
                    <h5>{{trans('admin.phone')}} : {{$user->phone}}</h5>
                    <h5>{{trans('admin.email')}} : {{$user->email}}</h5>
                    <h5>{{trans('admin.type')}} : {{$user->gender}}</h5>
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
                            <a class="nav-link active" data-toggle="pill" href="#ServicesRequests">{{__('admin.ServicesRequests')}}</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#UserReviews">{{__('admin.Reviews')}}</a>
                        </li>
                        {{--  <li>
                            <a class="nav-link" data-toggle="pill" href="#userServices">{{__('admin.userServices')}}</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#UserVehicle">{{__('admin.UserVehicle')}}</a>
                        </li>  --}}
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="ServicesRequests">
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
