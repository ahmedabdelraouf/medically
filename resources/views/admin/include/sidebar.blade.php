<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{url('/')}}">
            <img src="{{asset('img/logo/medical_egy_logo.jpeg')}}" width="50rem" height=".4rem" class="rounded-circle"
                 alt="medical_egy logo">
            <p class="logo-text"
               style="padding: 10px 10px 0 0;font-size: 24px;color: #4C2910;">{{trans('admin.app-name')}}</p>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                    <div class="hover-circle">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul class="iq-menu">
                <li class="{{active_link('admins')}}">
                    <a href="{{route('admins.index' ,['type'=>'service_providers'])}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/admins.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.service_providers')}} </span>
                    </a>
                </li>

                <li class="{{active_link('users')}}">
                    <a href="{{route('users.index' ,['type'=>'service_requesters'])}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.service_requesters')}} </span>
                    </a>
                </li>
                <li class="{{active_link('category-service')}}">
                    <a href="{{route('category-service.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/users.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.category_services')}} </span>
                    </a>
                </li>

                <li class="{{active_link('contact_us')}}">
                    <a href="{{route('contact_us.index' )}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/contact-us-message.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.contact_us')}} </span>
                    </a>
                </li>

                {{--                <li class="{{ active_link('countries') }}">--}}
                {{--                    <a href="{{ route('countries.index') }}" class="iq-waves-effect">--}}
                {{--                        <img src="{{ asset('assets/icons/users.svg') }}" class="images-sidebar"/>--}}
                {{--                        <span> {{ trans('admin.countries') }} </span>--}}
                {{--                    </a>--}}
                {{--                </li>--}}


                <li class="{{active_link('notifications')}}">
                    <a href="{{route('notifications.index' )}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/notifications.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.notifications')}} </span>
                    </a>
                </li>

                <li class="{{active_link('settings')}}">
                    <a href="{{route('show.settings' )}}" class="iq-waves-effect">
                        <img src="{{asset('assets/icons/settings.svg')}}" class="images-sidebar"/>
                        <span> {{trans('admin.settings')}} </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
