<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.header-assets')

    <body class="{{ request()->route()->getName() == 'admin.pos.system' ||  request()->route()->getName() == 'seller.pos.system' ? 'sidebar-mini' : '' }}">
        <div id="app">
            <div class="main-wrapper">
                @include('admin.partials.header')
                @if(Sentinel::getUser()->user_type == 'seller')
                    @include('seller.partials.sidebar')
                @else
                    @include('admin.partials.sidebar')
                @endif
                <div class="main-content">
                <!-- Main Content -->
                @yield('main-content')
                <!-- Main Content End -->
                </div>
                @include('admin.partials.footer')
            </div>
        </div>
        @include('admin.partials.footer-assets')
        @include('admin.partials.message')
        <input type="hidden" value="{{ settingHelper('live_api_currency') }}" id="is_currency_api_enabled">
        <input type="hidden" value="{{route('home')}}" id="url">
        <input type="hidden" value="{{route('index')}}" id="assets">
        <input name="get-me" type="hidden" id="get_user_type" value="{{ Sentinel::getUser()->user_type == 'seller' ? 'seller' : 'admin'}}" />
        <input type="hidden" class="sure" value="{{ __('Are you sure? ') }}">
        <input type="hidden" class="confirm_btn" value="{{ __('yes_do_it') }}">
        <input type="hidden" class="product_alert_danger" value="{{ __('product_disabled') }}">
        <input type="hidden" class="product_alert_success" value="{{ __('product_enabled') }}">
        <input type="hidden" class="package_danger" value="{{ __('package_disabled') }}">
        <input type="hidden" class="package_success" value="{{ __('package_enabled') }}">
        <input type="hidden" class="package_purchase_alert" value="{{ __('package_purchase_alert') }}">
        @yield('modal')
        <div class="overlayText d-none">
            <div>
                <img src="{{ static_asset('images/default/preloader.gif') }}" alt="updater">
                <p>{{ __('update_text') }}</p>
                <p>{{ __('update_browser_text') }}</p>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                let myVar = setInterval(myTimer, 1000);
                function myTimer() {
                    const d = new Date();
                    document.getElementById("current_date").innerHTML = d.toDateString();
                    document.getElementById("current_time").innerHTML = d.toLocaleTimeString();                    
                }
            });
        </script>
    </body>
</html>
