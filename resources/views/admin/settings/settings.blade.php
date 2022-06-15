@extends('admin.layout.base')
@section('title', trans('admin.settings'))
@section('content')
{{--    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>--}}
{{--<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/balloon-block/ckeditor.js"></script>--}}
<script src="{{asset('js/CkEditor5-30.js')}}"></script>
    <div class="row">

        <div class="col-lg-12">

            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">{{trans('admin.settings')}}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <dev class="'row">
                        <h1>Testing Document editor</h1>

                        <!-- The toolbar will be rendered in this container. -->
                        <div id="toolbar-container"></div>

                        <!-- This container will become the editable. -->
                        <div id="editor">
                            <p>This is the initial editor content.</p>
                        </div>

                        <script>
                            DecoupledEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                    const toolbarContainer = document.querySelector( '#toolbar-container' );

                                    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                                } )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </dev>

                @if(session()->has('success'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{{session()->get('success')}}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    {!! Form::open(['method'=>'post' , 'route'=>['update.settings'] , 'enctype'=>'multipart/form-data']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('phone' , trans('admin.phone')) !!}
                            {!! Form::text('website_phone' , old('website_phone') ?? Setting::get('website_phone') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'phone' , 'max'=>'100' , 'min'=>'3' , 'placeholder'=>trans('admin.phone') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('commission' , trans('admin.commission')) !!}
                            {!! Form::text('commission' , old('commission') ?? Setting::get('commission') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'commission' , 'max'=>'100' , 'min'=>'1' , 'placeholder'=>trans('admin.commission') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('ios_download_link' , trans('admin.ios_download_link')) !!}
                            {!! Form::url('ios_download_link' , old('ios_download_link') ?? Setting::get('ios_download_link') , ['class'=>'form-control' ,  'id'=>'ios_download_link' , 'placeholder'=>trans('admin.ios_download_link') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('android_download_link' , trans('admin.android_download_link')) !!}
                            {!! Form::url('android_download_link' , old('android_download_link') ?? Setting::get('android_download_link') , ['class'=>'form-control' , 'id'=>'android_download_link' , 'placeholder'=>trans('admin.android_download_link') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('facebook' , trans('admin.facebook')) !!}
                            {!! Form::url('facebook' , old('facebook') ?? Setting::get('facebook') , ['class'=>'form-control' , 'id'=>'facebook' , 'placeholder'=>trans('admin.facebook') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('twitter' , trans('admin.twitter')) !!}
                            {!! Form::url('twitter' , old('twitter') ?? Setting::get('twitter') , ['class'=>'form-control' , 'id'=>'twitter' , 'placeholder'=>trans('admin.twitter') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('instagram' , trans('admin.instagram')) !!}
                            {!! Form::url('instagram' , old('instagram') ?? Setting::get('instagram') , ['class'=>'form-control' , 'id'=>'instagram' , 'placeholder'=>trans('admin.instagram') ] ) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('linkedin' , trans('admin.linkedin')) !!}
                            {!! Form::url('linkedin' , old('linkedin') ?? Setting::get('linkedin') , ['class'=>'form-control' , 'id'=>'linkedin' , 'placeholder'=>trans('admin.linkedin') ] ) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('terms' , trans('admin.terms_of_use_ar')) !!}
                            {!! Form::textarea('terms_ar' , old('terms_ar') ?? Setting::get('terms_ar') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'terms_ar' , 'rows'=>'3' , 'placeholder'=>trans('admin.terms_of_use_ar') ] ) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('terms_en' , trans('admin.terms_of_use_en')) !!}
                            {!! Form::textarea('terms_en' , old('terms_en') ?? Setting::get('terms_en') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'terms_en' , 'rows'=>'3' , 'placeholder'=>trans('admin.terms_of_use_en') ] ) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('privacy_ar' , trans('admin.privacy_policy_ar')) !!}
                            {!! Form::textarea('privacy_ar' , old('privacy_ar') ?? Setting::get('privacy_ar') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'privacy_ar' , 'rows'=>'3' , 'placeholder'=>trans('admin.privacy_policy_ar') ] ) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('privacy_en' , trans('admin.privacy_policy_en')) !!}
                            {!! Form::textarea('privacy_en' , old('privacy_en') ?? Setting::get('privacy_en') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'privacy_en' , 'rows'=>'3' , 'placeholder'=>trans('admin.privacy_policy_en') ] ) !!}
                        </div>

                        <div class="form-group col-md-12">
                            {!! Form::label('about_ar' , trans('admin.about_ar')) !!}
                            {!! Form::textarea('about_ar' , old('about_ar') ?? Setting::get('about_ar') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'about_ar' , 'rows'=>'3' , 'placeholder'=>trans('admin.about_ar') ] ) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('about_en' , trans('admin.about_en')) !!}
                            {!! Form::textarea('about_en' , old('about_en') ?? Setting::get('about_en') , ['class'=>'form-control' , 'required'=>'required' , 'id'=>'about_en' , 'rows'=>'3' , 'placeholder'=>trans('admin.about_en') ] ) !!}
                        </div>

                        <div class="col-md-12">
                            {!! Form::submit(trans('admin.save') , ['class'=>'btn btn-primary ml-2 pull-left' ] ) !!}
                            {!! Form::reset(trans('admin.cancel') , ['class'=>'btn btn-secondary pull-left' ] ) !!}
                            <div class="clearfix"></div>
                        </div>
                    </div>
{{--                        <textarea name="ckeditor"></textarea>--}}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
<script>
    BalloonEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
{{--    <script>--}}
{{--        CKEDITOR.replace( 'ckeditor' );--}}
{{--    </script>--}}
@endsection
