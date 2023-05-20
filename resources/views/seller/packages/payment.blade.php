<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="title" content="{{ settingHelper('meta_title') }}" />
    <meta name="description" content="{{ settingHelper('meta_description') }}" />
    <meta name="keyword" content="{{ settingHelper('keyword') }}" />
    <meta name="article" content="{{ settingHelper('article') }}" />
    <meta name="language" content="{{ settingHelper('default_language') }}" />
    <title>@yield('title') | {{ settingHelper('admin_panel_title') != '' ?  settingHelper('admin_panel_title') : __('Yoori') }}</title>
@php
    $logo = settingHelper('og_image');
@endphp

    @if($logo != [] && $logo['original_image'] != '')
        <meta property="og:image" content="{{ static_asset($logo['original_image']) }}" />
    @else
        <meta property="og:image" content="{{static_asset('default-image/default-730x400.png') }}" alt="{!! settingHelper('meta_title') !!}" />
    @endif
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('admin/css/bootstrap.min.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ static_asset('admin/boxicons/css/boxicons.css') }}">
    <link rel="stylesheet" href="{{ static_asset('frontend/css/materialdesignicons.min.css') }}">

    <!-- Library -->
    <link rel="stylesheet" href="{{ static_asset('admin/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/select2.min.css') }}">

    @yield('page-style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ static_asset('admin/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ static_asset('admin/css/yoori.css') }}">
    <link rel="stylesheet" href="{{ static_asset('fonts/inter/css.css') }}">
    <!-- Custom CSS -->
    @if (request()->is('admin/pos'))
        <link rel="stylesheet" href="{{static_asset('frontend/css/vue-toastr-2.min.css')}}">
    @endif
    <link rel="stylesheet" href="{{ static_asset('admin/css/custom.css') }}">

    <!-- Favicon -->
    @php
        $icon = settingHelper('favicon');
    @endphp
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ ($icon != [] && @is_file_exists($icon['image_57x57_url'])) ? static_asset($icon['image_57x57_url']) : static_asset('images/ico/favicon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ ($icon != [] && @is_file_exists($icon['image_60x60_url'])) ? static_asset($icon['image_60x60_url']) : static_asset('images/ico/favicon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ ($icon != [] && @is_file_exists($icon['image_72x72_url'])) ? static_asset($icon['image_72x72_url']) : static_asset('images/ico/favicon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ ($icon != [] && @is_file_exists($icon['image_76x76_url'])) ? static_asset($icon['image_76x76_url']) : static_asset('images/ico/favicon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ ($icon != [] && @is_file_exists($icon['image_114x114_url'])) ? static_asset($icon['image_114x114_url']) : static_asset('images/ico/favicon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ ($icon != [] && @is_file_exists($icon['image_120x120_url'])) ? static_asset($icon['image_120x120_url']) : static_asset('images/ico/favicon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ ($icon != [] && @is_file_exists($icon['image_144x144_url'])) ? static_asset($icon['image_144x144_url']) : static_asset('images/ico/favicon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ ($icon != [] && @is_file_exists($icon['image_152x152_url'])) ? static_asset($icon['image_152x152_url']) : static_asset('images/ico/favicon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ ($icon != [] && @is_file_exists($icon['image_180x180_url'])) ? static_asset($icon['image_180x180_url']) : static_asset('images/ico/favicon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ ($icon != [] && @is_file_exists($icon['image_192x192_url'])) ? static_asset($icon['image_192x192_url']) : static_asset('images/favicon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ ($icon != [] && @is_file_exists($icon['image_32x32_url'])) ? static_asset($icon['image_32x32_url']) : static_asset('images/ico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ ($icon != [] && @is_file_exists($icon['image_96x96_url'])) ? static_asset($icon['image_96x96_url']) : static_asset('images/ico/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ ($icon != [] && @is_file_exists($icon['image_16x16_url'])) ? static_asset($icon['image_16x16_url']) : static_asset('images/ico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ static_asset('images/ico/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="{{ ($icon != [] && @is_file_exists($icon['image_144x144_url'])) ? static_asset($icon['image_144x144_url']) : static_asset('images/ico/favicon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- End Favicon -->
    @yield('style')
    @stack('style')
</head>
<body>
    <section class="shopping-cart api payment-method">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sg-shipping">
                        <div class="card-list">
                            <ul class="global-list grid-2 mobile-payment">
                                @if(settingHelper('is_paypal_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" value="paypal" id="paypal" name="payment">
                                            <label for="paypal">
                                                <img src="{{ url('public/images/payment-method/paypal.svg') }}"
                                                     alt="paypal"
                                                     class="img-fluid">
                                                {{ __('pay_with_payPal') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_stripe_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="stripe" value="stripe" name="payment">
                                            <label for="stripe">
                                                <img src="{{ url('public/images/payment-method/stripe.svg') }}"
                                                     alt="stripe"
                                                     class="img-fluid">
                                                {{ __('pay_with_stripe') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_sslcommerz_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" name="payment" id="ssl_commerze" value="ssl_commerze">
                                            <label for="ssl_commerze">
                                                <img src="{{ url('public/images/payment-method/sslcommerze.svg') }}"
                                                     alt="ssl_commerze"
                                                     width="90">
                                                {{ __('pay_with_sSLCOMMERZE') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_paytm_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="paytm" value="paytm" name="payment">
                                            <label for="paytm">
                                                <img src="{{ url('public/images/payment-method/paytm.svg') }}"
                                                     alt="paytm"
                                                     class="img-fluid">
                                                {{ __('pay_with_paytm') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_razorpay_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="razor_pay" value="razor_pay"
                                                   @change="integrateRazorPay"
                                                   name="payment">
                                            <label for="razor_pay">
                                                <img src="{{ url('public/images/payment-method/razorpay.svg') }}"
                                                     alt="razor_pay"
                                                     width="90"
                                                     class="img-fluid">
                                                {{ __('pay_with_razorpay') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_jazz_cash_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="jazzCash" value="jazz_cash"
                                                   name="payment">
                                            <label for="jazzCash">
                                                <img src="{{ url('public/images/payment-method/jazzCash.svg') }}"
                                                     alt="jazzCash"
                                                     width="90"
                                                     class="img-fluid">
                                                {{ __('pay_with_jazzCash') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_mollie_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="mollie" value="mollie"
                                                   name="payment">
                                            <label for="mollie">
                                                <img src="{{ url('public/images/payment-method/mollie.svg') }}"
                                                     alt="mollie"
                                                     width="90"
                                                     class="img-fluid">
                                                {{ __('pay_with_mollie') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if($paystack_activated)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="paystack" value="paystack"
                                                   name="payment">
                                            <label for="paystack">
                                                <img src="{{ url('public/images/payment-method/paystack.svg') }}"
                                                     alt="paystack"
                                                     width="90"
                                                     class="img-fluid">
                                                {{ __('pay_with_paystack') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if($fw_activated)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" id="flutter_wave" value="flutter_wave"
                                                   name="payment">
                                            <label for="flutter_wave">
                                                <img src="{{ url('public/images/payment-method/fw.svg') }}"
                                                     alt="flutter_wave"
                                                     width="90"
                                                     class="img-fluid">
                                                {{ __('pay_with_flutter') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_amarpay_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" value="amarpay" id="amarpay" name="payment">
                                            <label for="amarpay">
                                                <img src="{{ url('public/images/payment-method/amarpay.svg') }}"
                                                     alt="paypal"
                                                     class="img-fluid">
                                                {{ __('pay_with_amarpay') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_skrill_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" value="skrill" id="skrill" name="payment">
                                            <label for="skrill">
                                                <img src="{{ url('public/images/payment-method/skrill.svg') }}"
                                                     alt="paypal"
                                                     class="img-fluid">
                                                {{ __('pay_with_amarpay') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_iyzico_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" value="iyzico" id="iyzico" name="payment">
                                            <label for="iyzico">
                                                <img src="{{ url('public/images/payment-method/iyzico.svg') }}"
                                                     alt="paypal"
                                                     class="img-fluid">
                                                {{ __('pay_with_amarpay') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(settingHelper('is_kkiapay_activated') == 1)
                                    <li style="width:100%">
                                        <div class="input-checkbox">
                                            <input type="radio" value="kkiapay" id="kkiapay" name="payment">
                                            <label for="kkiapay">
                                                <img src="{{ url('public/images/payment-method/kkiapay.svg') }}"
                                                     alt="paypal"
                                                     class="img-fluid">
                                                {{ __('pay_with_amarpay') }}
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('offline_payment',$addons))
                                    @foreach($offline_methods as $offline)
                                        <li style="width:100%">
                                            <div class="input-checkbox">
                                                <input type="radio" data-id="{{ $offline->id }}"
                                                       data-name="{{$offline->getTranslation('name',app()->getLocale())}}"
                                                       data-instructions="{{ $offline->getTranslation('instructions',app()->getLocale()) }}"
                                                       id="offline_{{$offline->id}}"
                                                       value="offline_method" name="payment">
                                                <label for="offline_{{$offline->id}}">
                                                    <img src="{{ $offline->image }}" alt="{{ $offline->name }}"
                                                         class="img-fluid">
                                                    {{ $offline->name }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summary paymentCustom">
                        <div class="peymentToggler">
                            <div class="paymentHeader showHide">
                                <h6>{{ __('price_details') }}</h6>
                                <div class="sg-card">
                                    @php
                                        $action_url = URL::temporarySignedRoute('complete.package.purchase', now()->addMinutes(30), [
                        'user_id'       => authId(),
                        'trx_id'        => $trx_id,
                        'package_id'    => $package->id,
                        'response'      => 'yes',
                    ]);
                                    @endphp
                                </div>
                            </div>

                            <div class="paymentBTN-group">
                                <div class="order-total sm-fixed-bottom">
                                    <p>{{ __('total') }}
                                        <span>{{ get_price($amount,$currency) }}</span></p>

                                    <a href="javascript:void(0)"
                                       class="btn btn-primary paymentBTNFixed disable_btn">{{ __('pay_now') }}</a>

                                    <div class="div_btns d-none">
                                        <a href="{{ url("stripe/redirect?trx_id=$trx_id&package_id=$package->id")  }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none stripe_btn"> {{ __('pay_now') }}</a>

                                        <a href="{{ url("user/payment/paytmRedirect?trx_id=$trx_id&package_id=$package->id") }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none paytm_btn">{{ __('pay_now') }}</a>

                                        <a href="{{ url("get/ssl-response?payment_type=ssl_commerze&trx_id=$trx_id&package_id=$package->id") }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none ssl_commerze_btn"> {{ __('pay_now') }}</a>
                                        <a href="{{ url("amarpay/redirect?payment_type=amarpay&trx_id=$trx_id&package_id=$package->id") }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none amarpay_btn"> {{ __('pay_now') }}</a>

                                        <a href="{{ url("skrill/redirect?payment_type=skrill&trx_id=$trx_id&package_id=$package->id") }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none skrill_btn"> {{ __('pay_now') }}</a>


                                        <button class="btn btn-primary kkiapay-button paymentBTNFixed payment_btns d-none kkiapay_btn">{{ __('pay_now') }}</button>

                                        <a href="javascript:void(0)"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none paystack_btn">{{ __('pay_now') }}</a>

                                        <a href="{{ url("mollie/payment?trx_id=$trx_id&package_id=$package->id") }}"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none mollie_btn"> {{ __('pay_now') }}</a>

                                        <a href="#"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none flutter_wave_btn"
                                           data-toggle="modal" data-target="#fw_modal">{{ __('pay_now') }}</a>

                                        <button class="btn btn-primary paymentBTNFixed d-none loading" type="button"
                                                disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                            <span class="sr-only"></span>
                                        </button>

                                        <a href="javascript:void(0)"
                                           class="btn btn-primary paymentBTNFixed payment_btns d-none offline_method_btn"
                                           data-toggle="modal" data-target="#offline"> {{ __('pay_now') }}
                                            <span></span></a>
                                    </div>

                                    <div class="mx-auto w_40 payment_btns d-none paypal_btn"
                                         id="paypal-button-container"></div>
                                    <form name="jsform" class="d-none jazz_cash_btn payment_btns"
                                          action="{{ $jazz_url }}"
                                          method="POST">
                                        @foreach($jazz_data as $key=> $data)
                                            <input type="hidden" name="{{ $key }}"
                                                   value="{{ $data }}">
                                        @endforeach
                                        <button type="submit"
                                                class="btn btn-primary paymentBTNFixed jazz_btn">{{ __('pay_now') }}
                                        </button>
                                    </form>

                                    <form action="{{ $action_url }}" method="post">@csrf
                                        <input type="hidden" name="trx_id" value="{{ $trx_id }}">
                                        <input type="hidden" name="payment_type" value="razor_pay">
                                        <input type="hidden" name="amount" value="{{ $amount }}">
                                        <div id="razor_pay_btn_append"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sm-content-show"></div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section><!-- /.shopping-cart -->

    <!--offline -->
    <div class="modal fade" id="offline" tabindex="-1" aria-labelledby="offline_modal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('pay_with') }} <span class="offline_name"></span></h5>
                    <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="offline_form" id="offline_form" action="{{ $action_url }}" method="POST"
                          enctype="multipart/form-data">@csrf
                        <input type="hidden" name="payment_type" value="offline_method">
                        <input type="hidden" name="id" class="offline_id">
                        <input type="hidden" name="trx_id" value="{{ $trx_id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="labelSTL">{{ __('Upload File') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file d-flex">
                                            <label class="upload-image form-control" for="upload-1">
                                                <input type="file" id="upload-1" name="file">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 instruction_body">
                                <label>{{ __('instructions') }}</label>
                                <div class="instruction"></div>
                            </div>
                            <div class="col-lg-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary form_submit"
                                        id="offline_submit">{{ __('proceed') }}</button>
                                <button class="btn btn-primary d-none loading" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                          aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-body -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="fw_modal" tabindex="-1" aria-labelledby="fw_modal"
         aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('pay_with_flutter') }}</h5>
                    <button type="button" class="close modal_close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                        <div class="row">
                            <input type="hidden" name="public_key"
                                   value="{{ settingHelper('flutterwave_public_key') }}"/>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="customer[name]" class="form-control"
                                           placeholder="{{ __('name') }}" required/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="customer[email]" class="form-control"
                                       placeholder="{{ __('email') }}" required/>
                            </div>
                            <input type="hidden" name="tx_ref" value="{{ date('YmdHis') }}"/>
                            <input type="hidden" name="amount"
                                   value="{{ round($amount * $ngn_exchange_rate) }}"/>
                            <input type="hidden" name="currency" value="NGN"/>
                            <input type="hidden" name="meta[token]" value="54"/>
                            <input type="hidden" name="redirect_url" value="{{ $action_url }}"/>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" id="start-payment-button" class="btn btn-primary flutter_wave">
                                {{ __('pay') }} {{ get_price($amount,$currency) }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" class="package_id" value="{{ $package->id }}">
    <input type="hidden" class="total_amount" value="{{ $amount }}">
    <input type="hidden" class="trx_id" value="{{ $trx_id }}">
    <input type="hidden" class="url" value="{{ url('/') }}">
    <input type="hidden" class="auth_user" value="{{ authUser() }}">
    <input type="hidden" class="is_sslcommerz_sandbox_mode_activated"
           value="{{ settingHelper('is_sslcommerz_sandbox_mode_activated') == 1 }}">
    <input type="hidden" class="payment_success_url" value="{{ $action_url }}">

    <input type="hidden" id="stripe_key" value="{{ settingHelper('stripe_key') }}">

<!-- General JS Scripts -->
<script type="text/javascript" src="{{ static_asset('admin/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ static_asset('admin/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/stisla.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/bootstrap-fileselect.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ static_asset('admin/js/sweetalert211.min.js') }}"></script>
<!-- Template JS File -->
<script src="{{ static_asset('admin/js/scripts.js') }}"></script>
@stack('page-specific')
<script type="text/javascript" src="{{ static_asset('admin/js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ static_asset('admin/js/page/jquery.selectric.min.js') }}"></script>
<script src="{{ static_asset('admin/js/select2.min.js') }}"></script>
@stack('page-script')
<script src="{{ static_asset('admin/js/custom.js') }}"></script>
<script src="{{ static_asset('admin/js/media.js') }}"></script>
    <script>
        window.url = '';
        window.base_url = $('.url').val();
        window.amount = $('.total_amount').val();
        window.trx_id = $('.trx_id').val();
        window.code = $('.code').val();
        window.user = $('.auth_user').val();
        window.package_id = $('.package_id').val();
        window.ssl_sandobx_activated = $('.is_sslcommerz_sandbox_mode_activated').val();
    </script>
    @if(settingHelper('is_paypal_activated') == 1)
        <script data-namespace="paypal_sdk"
                src="https://www.paypal.com/sdk/js?client-id={{ settingHelper('paypal_client_id') }}&currency=USD"></script>
        <script src="{{ static_asset('frontend/js/paypal.js') }}"></script>
    @endif

    @if($paystack_activated)
        <script src="https://js.paystack.co/v2/inline.js"></script>
    @endif

    @if(settingHelper('is_razorpay_activated') == 1 && $indian_currency)
        <script>
            let myScript = document.createElement('script');

            myScript.setAttribute('type', 'text/javascript');
            myScript.setAttribute('language', 'javascript');
            myScript.setAttribute('data-key', '{{ settingHelper('razorpay_key') }}');
            myScript.setAttribute('data-amount', {{ round($amount * 100 * $indian_currency->exchange_rate) }});
            myScript.setAttribute('data-name', '{{ settingHelper('system_name') }}');
            myScript.setAttribute('data-description', 'Razorpay');
            myScript.setAttribute('data-image', '{{ url('/') }}');
            myScript.setAttribute('data-prefill.name', '');
            myScript.setAttribute('data-prefill.email', '');
            myScript.setAttribute('data-prefill.address', '');
            myScript.setAttribute('data-theme.color', '{{ settingHelper('menu_background_color') }}');
            myScript.setAttribute('src', '{{ static_asset('frontend/js/razor_pay_checkout.js') }}');
            document.getElementById('razor_pay_btn_append').insertAdjacentElement('afterend', myScript);
        </script>
    @endif
    <script>
        let ref = reference();
        (function ($) {
            'use strict';
            $(document).ready(function () {
                $('.razorpay-payment-button').hide().addClass('d-none');
                // Append script
                $(document).on('change', 'input[name="payment"]', function () {
                    let val = $(this).val();
                    $('.razorpay-payment-button').addClass('d-none');
                    $('.payment_btns').addClass('d-none');
                    $('.div_btns').removeClass('d-none');

                    let btn_selector = $('.' + val + '_btn');

                    if (val) {
                        btn_selector.removeClass('d-none');
                    }
                    if (val == 'razor_pay') {
                        $('.razorpay-payment-button').show().removeClass('d-none');
                    }
                    if (val) {
                        $('.disable_btn').hide();
                    } else {
                        $('.disable_btn').show();
                    }

                    if (val == 'offline_method') {
                        let id = $(this).data('id');
                        let name = $(this).data('name');
                        let instruction = $(this).data('instructions');
                        $('.instruction').html(instruction);
                        $('.offline_name').text(name);
                        $('.offline_id').val(id);
                    }
                });

                $(document).on('click', '.paystack_btn', function () {
                    let key = "{{ settingHelper('paystack_public_key') }}";
                    let amount = $('.total_amount').val() * parseFloat('{{ $ngn_exchange_rate }}') * 100;
                    const paystack = new PaystackPop();
                    paystack.newTransaction({
                        key: key,
                        amount: parseFloat(amount).toFixed(2),
                        email: 'yoori@spagreen.net',
                        channels: ['card', 'bank', 'ussd', 'mobile_money'],
                        currency: 'GHS',
                        reference: ref,
                        onSuccess: (transaction) => {
                            let url = $('.payment_success_url').val();
                            $.ajax({
                                url: url,
                                method: 'POST',
                                data: {
                                    payment_type: 'paystack',
                                    ref: transaction.reference
                                },
                                success: function (response) {
                                    window.location.href = response.url;
                                }
                            })

                        },
                        onCancel: () => {
                            // user closed popup
                        }
                    });
                });

            });
        })(jQuery);

        function reference() {
            let text = "";
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (let i = 0; i < 10; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            $('input[name = "tx_ref"]').val(text);

            return text;
        }

        let theButton = document.getElementById('iconHi');
        let theText = document.querySelector('.showHide');

        theButton.onclick = function () {
            theText.classList.toggle('ulHide');
            $("html, body").animate({scrollTop: 800}, 600);
        };

    </script>

</body>
</html>