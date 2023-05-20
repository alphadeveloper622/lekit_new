@extends('admin.partials.master')
@if(authUser()->user_type == 'admin')
    @section('package_active')
        active
    @endsection
@else
    @section('seller_subscription')
        active
    @endsection
@endif
@section('title')
    {{ __('packages') }}
@endsection
@if(authUser()->user_type == 'admin')
    @section('packages')
        active
    @endsection
@else
    @section('seller_package')
        active
    @endsection
@endif
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('all_packages')}}</h2>
                    <p class="section-lead">
                        {{ __('You have total') . ' ' . $packages->total() . ' ' . __('packages') }}
                    </p>
                </div>
                @if (hasPermission('service_create'))
                    <div class="buttons add-button">
                        <a href="{{ route('seller_packages.create') }}"
                           class="btn btn-icon icon-left btn-outline-primary">
                            <i class="bx bx-plus"></i>{{ __('add_package') }}</a>
                    </div>
                @endif
            </div>
            <div class="row">
                @if(authUser()->user_type == 'admin')
                    @include('admin.seller_packages.table')
                @else
                    @foreach($packages as $package)
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="pricing pricing-highlight">


                                @if(isset($active_package) && $active_package->seller_package_id == $package->id)
                                    @if($active_package->status == 0)
                                        <span class="badge custom-badge badge-danger">{{ __('deactivated') }}</span>
                                    @else
                                        @if(authUser()->active_subscription)
                                            <span class="badge custom-badge badge-success">{{ __('active') }}</span>
                                        @else
                                            <span class="badge custom-badge badge-warning">{{ __('expired') }}</span>
                                        @endif
                                    @endif
                                @endif

                                <div class="pricing-title">{{ $package->getTranslation('title', app()->getLocale()) }}</div>
                                <img src="{{ getFileLink('72x72',$package->image) }}" alt="asdas">
                                <div class="pricing-padding">
                                    <div class="pricing-price">
                                        <div class="text-uppercase">{{ $package->is_free == 1 ? __('free') : get_price($package->price) }}</div>
                                        <div>{{ __('for') }} {{ $package->duration }} {{ __('Day') }}</div>
                                    </div>
                                    <div class="pricing-details">
                                        <div class="pricing-item">
                                            <div class="pricing-item-icon"><i class="bx bx-check"></i></div>
                                            <div class="pricing-item-label">{{ __('upload_upto') }} {{ $package->product_upload_limit }} {{ __('product') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pricing-cta">
                                    @if(authUser()->active_subscription && isset($active_package) && $active_package->seller_package_id == $package->id)
                                        <a href="{{ route('packages.purchase', $package->id) }}">{{ __('renew') }} <i class="ion bx bx-right-arrow-alt"></i></a>
                                    @else
                                        <a class="{{ authUser()->subscription ? 'purchase_btn' : '' }}" href="{{ route('packages.purchase', $package->id) }}">{{ __('purchase') }} <i class="ion bx bx-right-arrow-alt"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @if(session()->has('info'))
        {{ \Brian2694\Toastr\Facades\Toastr::info(session()->get('info'), 'Info !!') }}
    @elseif(session()->has('success'))
        {{ \Brian2694\Toastr\Facades\Toastr::success(session()->get('success'), 'Success !!') }}
    @elseif(session()->has('warning'))
        {{ \Brian2694\Toastr\Facades\Toastr::warning(session()->get('warning'), 'Warning !!') }}
    @elseif(session()->has('error'))
        {{ \Brian2694\Toastr\Facades\Toastr::error(session()->get('error'), 'Error !!') }}
    @endif
@endsection
@include('admin.common.common-modal')
@push('script')
    <script>
        $(document).ready(function () {
            $(document).on('click','.purchase_btn', function (e) {
                e.preventDefault();
                let selector = $(this);
                let href = $(selector).attr('href');
                let msg = $('.package_purchase_alert').val();

                Swal.fire({
                    title: $('.sure').val(),
                    text: msg,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: $('.confirm_btn').val()
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                })
            });
        });
    </script>
@endpush