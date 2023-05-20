@extends('admin.partials.master')

@section(authUser()->user_type == 'admin' ? 'package_active' :'seller_subscription')
    active
@endsection
@section('title')
    {{ __('online_purchase_history') }}
@endsection
@section('online_subscriptions')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('online_purchase_history')}}</h2>
                    <p class="section-lead">
                        {{ __('founds') . ' ' . $purchases->total() . ' ' . __('rows') }}
                    </p>
                </div>
                <div class="buttons add-button">
                    <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" class="btn btn-icon icon-left btn-outline-primary"><i
                            class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-xs-12 col-md-12">
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{__('purchases')}}</h4>
                            <div class="card-header-form">
                                <form class="form-inline" id="sorting">
                                    @if(settingHelper('seller_system') == 1 && authUser()->user_type == 'admin')
                                        <div class="form-group">
                                            <select class="seller-by-ajax form-control select2" name="user_id" id ="seller_id"  aria-hidden="true" >
                                                @if(isset($seller))
                                                    <option selected value="{{ $seller->id }}"> {{ $seller->shop_name }} </option>
                                                @endif
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group mr-1">
                                        <select class="form-control selectric" name="s">
                                            <option {{ @$s == "latest_on_top" ? "selected" : "" }} value="latest_on_top">{{ __('Latest On Top') }}</option>
                                            <option {{ @$s == "oldest_on_top" ? "selected" : "" }} value="oldest_on_top">{{ __('Oldest On Top') }}</option>
                                            <option {{ @$s == "price_high" ? "selected" : "" }} value="price_high">{{ __('Price') }}{{ __('(Low > High)') }}</option>
                                            <option {{ @$s == "price_low" ? "selected" : "" }} value="price_low">{{ __('Price') }}{{ __('(High > Low)') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" value="{{ @$q }}" placeholder="{{ __('Search') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-outline-primary"><i class='bx bx-search'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        @if(authUser()->user_type == 'admin')
                                            <th>{{ __('Shop Name') }}</th>
                                        @endif
                                        <th>{{ __('package') }}</th>
                                        <th>{{ __('Payment Method') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __("purchase_date") }}</th>
                                        <th>{{ __("Status") }}</th>
                                    </tr>

                                    @foreach($purchases as $key => $purchase)
                                        <tr id="row_{{ $key+1 }}" class="table-data-row">
                                            <td>{{ $purchases->firstItem() + $key }}</td>
                                            @if(authUser()->user_type == 'admin')
                                                <td>{{ @$purchase->user->sellerProfile->shop_name }}</td>
                                            @endif
                                            <td>{{ $purchase->package->getTranslation('title', app()->getLocale()) }}</td>
                                            <td class="text-capitalize">{{ str_replace('_',' ',$purchase->payment_method) }}</td>
                                            <td>{{ get_price($purchase->amount) }}</td>
                                            <td>{{ Carbon\Carbon::parse($purchase->purchase_at)->format('d M Y h:i A') }}</td>
                                            @if($purchase->user->subscription && $purchase->id == $purchase->user->subscription->id)
                                                <td>
                                                    @if(authUser()->user_type == 'admin')
                                                        <label class="custom-switch mt-2 {{ true ? '' : 'cursor-not-allowed' }}">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                   value="subscription-status-change/{{ $purchase->id }}"
                                                                   {{ $purchase->status == 1 ? 'checked' : '' }} {{  true ? '' : 'disabled' }} class="{{  true ? 'subscription-status-change' : '' }} custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else
                                                        @if($purchase->status == 1)
                                                            <span class="badge badge-success">{{ __('Approved') }}</span>
                                                        @else
                                                            <span class="badge badge-warning">{{ __('Pending') }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $purchases->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/ajax-live-search.js') }}"></script>
@endpush
