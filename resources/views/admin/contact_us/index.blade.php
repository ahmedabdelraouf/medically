@extends('admin.layout.base')
@section('title', __('admin.contract_types'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--begin::Card-->
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">
                            {{__('admin.contact_us')}}
                        </h4>
                    </div>
                </div>
                {{--            <a href="{{route('contact_us.create',[app()->getLocale()])}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="{{trans('admin.add-contract_types')}}">--}}
                {{--                <i class="fa fa-plus"></i>--}}
                {{--            </a>--}}
                <div class="iq-card-body">
                    @if(session()->has('success'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{{session()->get('success')}}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example"
                           id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('admin.name')}}</th>
                            <th>{{trans('admin.phone')}}</th>
                            <th>{{trans('admin.message')}}</th>
                            <th>{{trans('admin.is_read')}}</th>
                            <th>{{trans('admin.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact_us as $index=>$item)
                            <tr>
                                <td>{{$index += 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->message}}</td>
                                <td>@if($item->status==0)
                                        {{trans('admin.not_been_contacted')}}
                                    @elseif($item->status==1)
                                        {{trans('admin.been_contacted')}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="flex align-items-center list-user-action">
                                        @if($item->status == 0)
                                        {!! Form::open(['method'=>'put' , 'route'=>['contact_us.update' , [ $item->id]] , 'class'=>'d-inline']) !!}
                                        {!! Form::hidden('status' , 1) !!}
                                        <button type="submit" class="iq-bg-primary border-0" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="{{trans('admin.read')}}">
                                                <i class="ri-pencil-line"></i>
                                        </button>
                                        {!! Form::close() !!}
                                        @endif
                                        <a class="iq-bg-primary" href="#" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                            <i class="ri-delete-bin-line" data-toggle="tooltip" data-placement="top" title="{{trans('admin.delete')}}"></i>
                                        </a>
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('admin.delete')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-left">
                                                            {{__('admin.are-you-sure')}}
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.cancel')}}</button>
                                                        {!! Form::open(['method'=>'delete' , 'route'=>['contact_us.destroy' , [ $item->id]] , 'class'=>'d-inline']) !!}
                                                        <button type="submit" class="btn btn-primary border-0" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="{{trans('admin.delete')}}">
                                                                {{trans('admin.delete')}}
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
