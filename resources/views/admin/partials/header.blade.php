<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline {{ $locale_language->text_direction == 'rtl' ? 'ml-auto' : 'mr-auto' }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="bx bx-menu"></i></a>
            </li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">
        <li>
            <a href="{{ route('cache.clear') }}" class="btn btn-outline-danger" tabindex="4" style="font-size: 0.8rem; padding: 6px">
                {{ __('clear_cache') }}
            </a>
        </li>
        <li>
            <div class="p-1 ml-3 bg-light d-flex align-items-center">
                @php
                    $lang = $active_languages->where('locale',app()->getLocale())->first();
                @endphp
                <img alt="image" src="{{ static_asset($lang->flag) }}" class="mr-1" height="30">
                <div class="d-flex flex-column">
                    <div id="current_date" class="text-center" style="font-size: 0.8rem; line-height: 1rem"></div>
                    <div id="current_time" class="text-center font-weight-bold" style="font-size: 0.8rem; line-height: 1rem"></div>
                </div>
            </div>
        </li>
        @if(addon_is_activated('pos_system') && authUser()->user_type != 'seller')
            <li>
                <a href="{{ route('admin.pos.system') }}" target="_blank" class="nav-link nav-link-lg"
                   data-toggle="tooltip" data-original-title="{{ __('POS') }}"><i class="bx bx-printer"></i></a>
            </li>
        @endif
        @if(addon_is_activated('pos_system') && settingHelper('is_pos_activated_for_seller') && authUser()->user_type == 'seller')
            <li>
                <a href="{{ route('seller.pos.system') }}" target="_blank" class="nav-link nav-link-lg"
                   data-toggle="tooltip" data-original-title="{{ __('POS') }}"><i class="bx bx-printer"></i></a>
            </li>
        @endif
        @if(config('app.mobile_mode') == 'off' || is_dir('resources/views/frontend'))
            <li>
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? config('app.url').'/shop/'.Sentinel::getUser()->sellerProfile->slug : url('/') }}"
                   target="_blank" class="nav-link nav-link-lg" data-toggle="tooltip"
                   data-original-title="{{ __('Visit Store') }}"><i class="bx bx-globe"></i></a>
            </li>
        @endif
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                     class="nav-link notification-toggle nav-link-lg {{ $notificationCount > 0 ? 'beep' : '' }} "><i
                        class="bx bx-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">{{ __('Notifications') }}
                    <div class="float-right">
                        <a href="{{ route('mark.notification.seen') }}">{{ __('Mark All As Read') }}</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    @php
                        $user_type = sentinel::getUser()->user_type != 'customer' ? sentinel::getUser()->user_type : '';
                    @endphp
                    @foreach($notifications as $notification)
                        <a href="{{ $notification->url != '' || $notification->url != null ? url($user_type.'/'.$notification->url) : "javascript:void(0)" }}"
                           class="dropdown-item dropdown-item-unread notification-status"
                           data-notification="{{ json_encode($notification) }}">
                            <div class="dropdown-item-icon {{ $notification->status == 'seen' ? "bg-info" : 'bg-primary' }} text-white">
                                @if($notification->status == 'seen')
                                    <i class="bx bx-check"></i>
                                @else
                                    <i class="bx bx-x"></i>
                                @endif
                            </div>
                            <div class="dropdown-item-desc">
                                {{ $notification->title }}
                                <div class="time {{ $notification->status == 'seen' ? "" : 'text-primary' }}">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                            </div>
                        </a>
                        <input type="hidden" id="path" value="{{request()->path()}}"/>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ route('notification.all') }}">{{ __('View All') }} <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                @if(Sentinel::getUser()->images && array_key_exists('image_40x40',Sentinel::getUser()->images) && @is_file_exists(Sentinel::getUser()->images['image_40x40']))

                    <img alt="{{Sentinel::getUser()->first_name}}"
                         src="{{static_asset(Sentinel::getUser()->images['image_40x40'])}}" class="rounded-circle mr-1">
                @else
                    <img alt="{{Sentinel::getUser()->first_name}}"
                         src="{{static_asset('images/default/user32x32.jpg')}}" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">{{Sentinel::getUser()->first_name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(@Sentinel::getUser()->lastLogin())
                    <div class="dropdown-title">{{ __('Logged in :minutes',['minutes' => \Carbon\Carbon::parse(Sentinel::getUser()->lastLogin())->diffForHumans()])}}</div>
                @endif
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? route('seller.profile') : route('admin.profile') }}"
                   class="dropdown-item has-icon">
                    <i class="bx bx-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? route('seller.login.activity') : route('admin.login.activity') }}"
                   class="dropdown-item has-icon">
                    <i class='bx bx-file'></i>{{ __('Login Activities') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="bx bx-log-out"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>
