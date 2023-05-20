@extends('admin.partials.master')
@section('title')
    {{ __('Processed Refund') }}
@endsection
@section('refund_active')
    active
@endsection
@section('processed_refunds')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Processed Refund List') }}</h2>
                    <p class="section-lead">
                        {{ __('You have total') . ' ' . $refunds->total() . ' ' . __('Processed Refunds') }}
                    </p>
                </div>
            </div>
            @php
                $q                  = isset($_GET['q']) ? $_GET['q'] : null;
            @endphp
            <div class="row">
                <div class="col-sm-xs-12 col-md-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ __('Processed Refunds') }}</h4>
                            <div class="card-header-form">
                                <form class="form-inline" id="sorting">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="{{ @$q }}"
                                               placeholder="{{ __('Search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-outline-primary"><i class="bx bx-search"></i>
                                            </button>
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
                                        <th>#</th>
                                        <th>{{ __('Order Code') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Refund Status') }}</th>
                                        <th>{{ __('Processed At') }}</th>
                                        <th>{{ __('Option') }}</th>
                                    </tr>

                                    @foreach ($refunds as $key => $refund)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            @if ($refund->order != null)
                                                <td>{{ $refund->order->code }}</td>
                                            @endif
                                            @if ($refund->orderDetail->product)
                                                <td>
                                                    {{ $refund->orderDetail->product->getTranslation('name', \App::getLocale()) }}
                                                    @if($refund->orderDetail->variation)
                                                        <br>
                                                        <span>{{__('Variant').': '. $refund->orderDetail->variation }}</span>
                                                    @endif
                                                </td>
                                            @endif
                                            <td class="text-success">
                                                {{ucfirst($refund->status)}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($refund->updated_at)->format('d,M Y h:i a')}}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-outline-info btn-circle currency-add-btn modal-menu"
                                                   data-toggle="modal" title=""
                                                   data-title="{{ __('Refund Request') }}"
                                                   data-url="{{ route('seller.edit-info', ['page_name' => 'refund-view', 'param1' => $refund->id]) }}"
                                                   data-target="#common-modal">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $refunds->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('admin.common.common-modal')
@include('admin.common.process-refund-ajax')
