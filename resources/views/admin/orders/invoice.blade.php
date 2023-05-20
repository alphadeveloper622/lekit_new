<?php $color        =   '#333333';?>
    <!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet" type="text/css">
    <title>INV-{{ $order->code }}</title>
    <style>
        body {
            font-family: '{{ $order->font_name }}';
            font-size: 10pt;
            line-height: 13pt;
            color: #000;
        }
        p {
            margin: 4pt 0 0 0;
        }
        td {
            vertical-align: top;
        }
        .items td {
            border: 0.2mm solid #dadee1;
            background-color: #ffffff;
        }
        .items tr.border-less td {
            border: 0;
            background-color: #ffffff;
        }
        table thead td {
            vertical-align: bottom;
            text-transform: uppercase;
            font-size: 8pt;
            font-weight: bold;
            background-color: #dadee1;
            color: #333;
        }
        table thead td {
            border-bottom: 0.2mm solid #dadee1;
        }
        table .last td {
            border-bottom: 0.2mm solid #dadee1;
        }
        table .first td {
            border-top: 0.2mm solid #dadee1;
        }
        .watermark {
            text-transform: uppercase;
            font-weight: bold;
            position: absolute;
            left: 100px;
            top: 400px;
        }
        .left{
            text-align: left;
        }
        .right{
            text-align: right;
        }
        .center{
            text-align: center;
        }
    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td width="32%" class="d-inline-block">
            @php
                $logo = settingHelper('invoice_logo');
            @endphp
            <a href="{{ url('/') }}">
                <img src="{{($logo != [] && @is_file_exists($logo['image_118x45'])) ? static_asset($logo['image_118x45']) : static_asset('images/default/dark-logo.png') }}" alt="Logo">
            </a>
        </td>
        <td width="3%" class="right"></td>
        <td width="30%" class="center">
            <strong>{{ settingHelper('system_name') }}</strong>
            <p>{{ settingHelper('contact_email') ? : settingHelper('header_contact_email') }}</p>
            <p>{{ settingHelper('contact_phone') ? : settingHelper('header_contact_phone')  }}</p>
        </td>
        <td width="3%" class="right"></td>
        <td width="32%" class="right"><div style="font-weight: bold; color:#333333; font-size: 16px; text-transform: uppercase;">{{ __('Invoice') }}</div>
        </td>
    </tr>
</table>
<table width="100%" style="vertical-align: top;">
    <tr>
        @if(!$order->pickupHub)
        <td width="32%">
            @php
                $shipping_address = $order->shipping_address;
            @endphp
            @if($shipping_address)
                <table width="100%">
                    <tr>
                        <td width="100%" style="border-bottom:0.2mm solid #dadee1; font-size: 9pt; font-weight:bold; color: #333333; text-transform: uppercase;">
                            {{__('Shipping To')}}</td>
                    </tr>
                    <tr>
                        <td width="100%">

                            <strong>{{ $shipping_address['name'] }}</strong>
                            <p>{{ $shipping_address['address'] }}, {{ @$shipping_address['city'] }}, {{ @$shipping_address['country'] }} </p>
                            <p>{{ isDemoServer() ? emailAddressMask($shipping_address['email']) : $shipping_address['email'] }} </p>
                            <p>{{ @$shipping_address['phone_no'] }}</p>

                        </td>
                    </tr>
                </table>
            @endif
        </td>
        <td width="32%">
            @php
                $billing_address = $order->billing_address;
            @endphp
            @if($billing_address)
                <table width="100%">
                    <tr>
                        <td width="100%" style="border-bottom:0.2mm solid #dadee1; font-size: 9pt; font-weight:bold; color: #333333; text-transform: uppercase;">
                            {{__('Bill To')}}</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <strong>{{ $billing_address['name'] }}</strong>
                            <p>{{ $billing_address['address'] }}, {{ @$billing_address['city'] }}, {{ @$billing_address['country'] }} </p>
                            <p>{{ isDemoServer() ? emailAddressMask($billing_address['email']) : $billing_address['email'] }}</p>
                            <p>{{ @$billing_address['phone_no'] }}</p>
                        </td>
                    </tr>
                </table>
            @endif
        </td>
        @else
            <td width="64%">
                <table width="100%">
                    <tr>
                        <td width="100%" style="border-bottom:0.2mm solid #dadee1; font-size: 9pt; font-weight:bold; color: #333333; text-transform: uppercase;">
                            {{__('Pickup Hub')}}</td>
                    </tr>
                    <tr>
                        <td width="100%">
                                {{ __('Name') }} : {{ @$order->pickupHub->name }}<br>
                                {{ __('Manager') }} : {{ @$order->pickupHub->incharge->full_name }}<br>
                                {{ __('Address') }} : {{ @$order->pickupHub->address }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        @endif


        <td width="38%">
            <table width="100%">
                <tr>
                    <td width="100%" style="border-bottom:0.2mm solid #dadee1; font-size: 9pt; font-weight:bold; color: #333333; text-transform: uppercase;">
                        <strong>{{ __('Order Info') }}</strong>
                </tr>
                <tr>
                    <td width="100%">
                        <p><strong>{{ __('Order No') }}#</strong> {{ $order->code }}</p>
                        <p>{{ __('Order Date') }} : {{ date('M d,Y', strtotime($order->date)) }}</p>
                        <p style="text-transform: capitalize">{{ __('Payment Type') }} : {{ str_replace('_',' ',$order->payment_type) }}</p>
                        <p>{{ __('Status') }} : {{ $order->payment_status }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="items" width="100%" style="border-spacing:3px; font-size: 9pt; border-collapse: collapse;" cellpadding="10">
    <thead >
    <tr>
        <td width="5%">#</td>
        <td width="35%">{{__('Product')}}</td>
        <td class="center" width="15%">{{__('Unit Price')}}</td>
        <td class="center" width="15%">{{__('Quantity')}}</td>
        <td class="center" width="10%">{{__('Tax')}}</td>
        <td class="right" width="20%">{{__('Totals')}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($order->orderDetails as $key => $orderDetail)
        <tr style="border-bottom: 1px solid #ccc;">
            <td>{{ $key+1 }}</td>
            <td>
                <div class="d-flex">
                    @if(!blank($orderDetail->product))
                        <div class="text-left">
                            @if ($orderDetail->product->thumbnail != [] && is_file_exists($orderDetail->product->thumbnail['image_40x40'], $orderDetail->product->thumbnail['storage']))
                                <img
                                    src="{{ get_media($orderDetail->product->thumbnail['image_40x40'], $orderDetail->product->thumbnail['storage']) }}"
                                    alt="{{ $orderDetail->product->name }}"
                                    class="mr-3 rounded">
                            @else
                                <img
                                    src="{{ static_asset('images/default/default-image-40x40.png') }}"
                                    alt="{{ $orderDetail->product->name }}"
                                    class="mr-3 rounded">
                            @endif
                        </div>
                        <div class="ml-1">
                            {{ $orderDetail->product->getTranslation('name', \App::getLocale()) }} @if($orderDetail->variation != null)
                                ({{ $orderDetail->variation }}) @endif
                        </div>
                    @else
                        <div class="text-left">
                            <img
                                src="{{ static_asset('images/default/default-image-40x40.png') }}"
                                alt="N/A"
                                class="mr-3 rounded">
                        </div>
                        <div class="ml-1">
                            N/A
                        </div>
                    @endif
                </div>
            </td>
            <td class="center">{{ get_price($orderDetail->price) }}</td>
            <td class="center">{{ $orderDetail->quantity }}</td>
            <td class="center">{{ $orderDetail->tax }}</td>
            <td class="right">{{ get_price($orderDetail->price * $orderDetail->quantity) }}</td>
        </tr>
    @endforeach
    <tr class="border-less"  style="border-bottom: 1px solid #ececec !important;">
        <td colspan="5" align="right"><strong>{{__('Sub Total')}}:</strong></td>
        <td colspan="1" class="right"><strong>{{ get_price($order->sub_total,user_curr()) }}</strong></td>
    </tr>
    <tr class="border-less">
        <td colspan="5" align="right">(-) {{__('Discount')}}:</td>
        <td colspan="1" class="right">{{ get_price($order->discount,user_curr()) }}</td>
    </tr>
    <tr class="border-less">
        <td colspan="5" align="right">(-) {{ __('Coupon Discount') }}:</td>
        <td colspan="1" class="right">{{ get_price($order->coupon_discount,user_curr()) }}</td>
    </tr>
    <tr class="border-less">
        <td colspan="5" align="right">(+) {{ __('Total Tax') }}:</td>
        <td colspan="1" class="right">
            {{ get_price($order->total_tax,user_curr()) }}
        </td>
    </tr>
    <tr class="border-less"  style="border-bottom: 1px solid #ececec !important;">
        <td colspan="5" align="right"><strong>{{ __('Total Amount') }}</strong></td>
        <td colspan="1" class="right"><strong>{{ get_price($order->total_amount,user_curr()) }}</strong></td>
    </tr>
    <tr class="border-less">
        <td colspan="5" align="right">(+) {{ __('Shipping Cost') }}:</td>
        <td colspan="1" class="right">{{ get_price($order->shipping_cost,user_curr()) }}</td>
    </tr>
    <tr class="border-less">
        <td colspan="5" align="right"><strong>{{ __('Net Payable') }}:</strong></td>
        <td colspan="1" class="right">
            <strong>
                {{ get_price($order->total_payable,user_curr()) }}
            </strong>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
