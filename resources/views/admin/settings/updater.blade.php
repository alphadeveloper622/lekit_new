@extends('admin.partials.master')
@section('updater')
    active
@endsection
@section('title')
    {{ __('Update System') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Update System') }}</h2>
                </div>
            </div>
        </div>
        <div class="alert fade show d-none alert_div" role="alert">
            <strong></strong> <span></span>
        </div>
        <div class="row block-element">
            <div class="col-sm-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header input-title">
                        <h4>{{ __('Update') }}</h4>
                    </div>
                    <div class="card-body card-body-paddding">
                        @php
                            $latest_version = $response->version;
                            $is_old         = settingHelper('current_version') < $latest_version;
                            $next_version   = 'v'.implode('.',str_split(settingHelper('current_version') + 1));
                        @endphp
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="alert alert-{{ $is_old ? 'danger' : 'info'}}">
                                        <h5 class="bold">Your Version</h5>
                                        <p class="font-medium bold">{{ get_version(settingHelper('current_version')) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="alert alert-{{ $is_old ? 'success' : 'info'}}">
                                        <h5 class="bold">{{ __('latest_version') }}</h5>
                                        <p class="font-medium bold">{{ get_version($latest_version) }}</p>
                                    </div>
                                </div>
                            </div>
                            @if(!$is_old)
                                <div class="alert alert-success center">
                                    <p><i class="bx bx-check-circle"></i> {{ __('You are using the latest version') }}</p>
                                </div>
                            @else
                                <div class="alert alert-warning center">
                                    <p><i class="bx bx-alarm-exclamation"></i> {{ __('An update is available') }}</p>
                                </div>

                                <div class="alert alert-success center">
                                    <button type="submit" class="btn btn-outline-light text-black" tabindex="4" id="download_update"
                                            data-url="{{ route('admin.download.update') }}">
                                        <i class="bx bx-download"></i> {{ __('Process Update') }} <span class="text-lowercase">({{ $next_version }})</span>
                                    </button>
                                    <button type="submit" class="btn btn-outline-light text-black disable_btn d-none" tabindex="4" id="preloader">
                                        <img src="{{ static_asset('images/default/preloader.gif') }}" alt="updater" height="22">
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header input-title">
                        <h4>{{ __('System Update Procedures') }}</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ __('Please check this before hitting the update button') }}:</p>
                        <ol>
                            <li> It is strongly recommended to create a full backup of your current installation (files and database)</li>
                            <li> Please keep the server on maintenance mode before processing your update from here <a href="{{ route('preference') }}" target="_blank">Preferences</a></li>
                            <li> Review the <a href="https://codecanyon.net/item/yoori-laravel-vue-multivendor-pwa-ecommerce-cms-php-script/37142846#item-description__change-log" target="_blank">Change Log</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
