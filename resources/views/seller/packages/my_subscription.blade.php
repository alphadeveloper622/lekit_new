@extends('admin.partials.master')

@section('title')
    {{__('My Subscription')}}
@endsection
@section('seller_subscription')
    active
@endsection

@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('my_subscription')}}</h2>
                    <p class="section-lead">
                        {{ __('My Subscribed Package') }}
                    </p>
                </div>
                {{-- <div class="buttons add-button">
                    <a href="{{ route('seller_packages.create') }}" class="btn btn-icon icon-left btn-outline-primary">
                        <i class="bx bx-plus"></i>{{ __('purchase_history') }}</a>
                </div> --}}
                <div class="dropdown buttons add-button">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-icon icon-left btn-outline-primary" aria-expanded="false">
                        <div class="d-sm-none d-lg-inline-block">{{ __('purchase_history') }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item has-icon" href="{{ route('online.purchase.history') }}" style="color:black !important">
                            {{ __('online_purchase_history') }}
                        </a>
                        <a class="dropdown-item has-icon" href="{{ route('offline.purchase.history') }}" style="color:black !important">
                            {{ __('offline_purchase_history') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@if(addon_is_activated('seller_subscription'))
@php
    $subscription = authUser()->active_subscription;
    $package = authUser()->subscription;
@endphp
<div class="col-12 col-md-4 col-lg-4">
    <div class="card card-statistic-3">
        <div class="card-stats">
            <div class="card-stats-title d-flex justify-content-between">
                <h4>{{__('subscribed_package')}}</h4>
            </div>
            <div class="purchased-card">
                @if($package)
                    @if($package->status == 0)
                        <span class="badge custom-badge badge-danger">{{ __('deactivated') }}</span>
                    @else
                        @if($subscription)
                            <span class="badge custom-badge badge-success">{{ __('active') }}</span>
                        @else
                            <span class="badge custom-badge badge-warning">{{ __('expired') }}</span>
                        @endif
                    @endif
                    <div class="purchased-content">
                        <div class="purchased-img">
                            <img src="{{ getFileLink('72x72',$package->logo) }}"
                                 alt="{{ $title = $package->package->getTranslation('title',app()->getLocale()) }}">
                        </div>
                        <div class="purchased-text">
                            <h5>{{ $title }}</h5>
                            <p>{{ __('product_upload_limit') }}:
                                <span>{{ $package->product_upload_limit }}</span></p>
                            <p>{{ __('package_expire_at') }}:
                                <time datetime="{{ \Carbon\Carbon::parse($package->expires_at)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($package->expires_at)->format('Y-m-d h:i A') }}</time>
                            </p>
                            <div class="text-center">
                                <a href="{{ route('seller.packages') }}"
                                   class="btn btn-outline-info btn-circle mt-2">{{ __('upgrade_package') }}</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="purchased-content text-center">
                        <h6 class="text-danger mt-5">{{ __('no_purchased_packaged_found') }}</h6>
                        <small class="text-danger">{{ __('you_cant_upload_any_product') }}</small>
                        <div class="mt-5 mb_33">
                            <a href="{{ route('seller.packages') }}" class="btn btn-outline-info btn-circle mt-2">{{ __('upgrade_package') }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection