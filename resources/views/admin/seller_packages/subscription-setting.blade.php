@extends('admin.partials.master')
@section('title')
    {{ __('subscription_setting') }}
@endsection
@section('package_active')
    active
@endsection
@section('subscription_settings_active')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('subscription_setting') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-xs-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ __('seller_subscription_setting') }}</h4>
                                </div>
                                <div class="card-body col-sm-xs-12">
                                    <div>
                                        <form action="{{ route('update.website.seo')}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="subscription_method">{{ __('subscription_method') }}</label>
                                                    <select name="subscription_method" id="subscription_method"
                                                            class="form-control selectric">
                                                        <option value="1" {{ settingHelper('subscription_method') == 1 ? 'selected' : '' }}>{{ __('adjustable') }}</option>
                                                        <option value="0" {{ settingHelper('subscription_method') == 0 ? 'selected' : '' }}>{{ __('not_adjustable') }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 text-right mt-3">
                                                    <button type="submit" class=" btn btn-outline-primary pr-3"
                                                            tabindex="1">
                                                        {{ __('Save') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header input-title">
                                    <h4>{{ __('method_info') }}</h4>
                                </div>
                                <div class="card-body card-body-paddding">
                                    <div class="contents mt-2">
                                        {{ __('type_details') }}:
                                        <ul class="text-justify">
                                            <li>
                                                1.
                                                <strong>{{ __('adjustable') }}</strong>: {{ __('adjustable_help_text') }}
                                                {{ __('suppose') }},
                                                {!! __('adjustable_help_text2') !!}
                                            </li>
                                            <li>
                                                2.
                                                <strong>{{ __('not_adjustable') }}</strong>: {{ __('not_adjustable_help_text') }}
                                                .
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header input-title">
                                    <h4>{{ __('cron_job_setting') }}</h4>
                                </div>
                                <div class="card-body card-body-paddding">
                                    <div class="contents mt-2">
                                        <ul class="text-justify">
                                            <li>
                                                {{ __('cron_job_expiration') }}
                                                <p>
                                                    {{ __('cron') }}: * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
                                                    <a href="https://laravel.com/docs/9.x/scheduling#running-the-scheduler">{{ __('for_more_info_click_here') }}</a>
                                                </p>
                                                <a href="{{ route('cron.subscription') }}" class="btn btn-xs btn-primary">{{ __('run_cron_manually') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection @include('admin.common.delete-ajax')
