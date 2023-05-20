@extends('admin.partials.master')

@section('slider_active')
    active
@endsection
@section('title')
    {{ __('Sliders') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('All Sliders')}}</h2>
                    <p class="section-lead">
                        {{ __('You have total') . 90 . __('Sliders') }}
                    </p>
                </div>
                @if (hasPermission('slider_create'))
                    <div class="buttons add-button">
                        <a href="{{ route('sliders.create') }}" class="btn btn-icon icon-left btn-outline-primary">
                            <i class="bx bx-plus"></i>{{ __('Add Slider') }}</a>
                        <a href="{{ route('banners.create') }}" class="btn btn-icon icon-left btn-outline-primary">
                            <i class="bx bx-plus"></i>{{ __('add_banner') }}</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-xs-12 col-md-12">
                    <div class="card">
                        <form action="">
                            <div class="card-header input-title">
                                <h4>{{__('Packages')}}</h4>
                            </div>
                        </form>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Duration') }}</th>
                                        <th>{{ __("Features") }}</th>
                                        <th>{{ __('Status') }}</th>
                                        @if (hasPermission('slider_update') || hasPermission('slider_delete'))
                                            <th>{{__('Options')}}</th>
                                        @endif
                                    </tr>
                                    @php
                                        $arr = ['Silver','Premium','Gold'];
                                    @endphp
                                    @foreach($arr as $key => $slider)
                                        <tr id="row_{{ $key+1 }}" class="table-data-row">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $slider }}</td>
                                            <td>{{ get_price(99) }}</td>
                                            <td>
                                                90 Days
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <p class="text-success warning_txt mt-0"><i class="bx bxs-check-circle"></i></p>
                                                    <p>{{ __('Product Upload up to 100') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="text-success warning_txt mt-0"><i class="bx bxs-check-circle"></i></p>
                                                    <p>{{ __('Campaign Create up to 100') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="text-success warning_txt mt-0"><i class="bx bxs-check-circle"></i></p>
                                                    <p>{{ __('Coupon Create up to 100') }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Active</span>
                                            </td>
                                            <td>
                                                <a href="{{route('seller-packages.edit',1)}}" class="btn btn-outline-secondary btn-circle"
                                                   data-toggle="tooltip" title=""
                                                   data-original-title="{{ __('Edit') }}"><i class="bx bx-edit"></i></a>

                                                <a href="javascript:void(0)" onclick="delete_row('seller-packages/destroy',9)"
                                                   class="btn btn-outline-danger btn-circle" data-toggle="tooltip"
                                                   title=""
                                                   data-original-title="{{ __('Delete') }}"><i class="bx bx-trash"></i></a>
                                            </td>
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
    </section>
    @include('admin.common.selector-modal')
@endsection
@include('admin.common.delete-ajax')

@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush
