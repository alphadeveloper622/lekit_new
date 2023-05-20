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
              <ul class="global-list grid-2">
                <li>
                  <div class="input-checkbox">
                    <input type="radio" value="paypal" id="paypal" name="payment">
                    <label for="paypal">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/paypal.svg" alt="paypal" class="img-fluid">
                      Pay with PayPal
                    </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                    <input type="radio" id="stripe" value="stripe" name="payment">
                    <label for="stripe">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/stripe.svg" alt="stripe" class="img-fluid">
                      Pay with stripe
                    </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                    <input type="radio" name="payment" id="ssl_commerze" value="ssl_commerze">
                    <label for="ssl_commerze">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/sslcommerze.svg" alt="ssl_commerze" width="90">
                      Pay with SSLCOMMERZE
                    </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                    <input type="radio" id="paytm" value="paytm" name="payment">
                    <label for="paytm">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/paytm.svg" alt="paytm" class="img-fluid">
                      Pay with Paytm
                    </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                    <input type="radio" id="razor_pay" value="razor_pay" name="payment">
                    <label for="razor_pay">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/razorpay.svg" alt="razor_pay" width="90" class="img-fluid">
                      Pay with Razorpay
                    </label>
                  </div>
                </li>
                <li>
                <div class="input-checkbox">
                  <input type="radio" id="jazzCash" value="jazz_cash" name="payment">
                  <label for="jazzCash">
                    <img src="https://yoori.spagreen.net/public/images/payment-method/jazzCash.svg" alt="jazzCash" width="90" class="img-fluid">
                    Pay with JazzCash
                  </label>
                </div>
                </li>
                <li>
                <div class="input-checkbox">
                  <input type="radio" id="mollie" value="mollie" name="payment">
                  <label for="mollie">
                    <img src="https://yoori.spagreen.net/public/images/payment-method/mollie.svg" alt="mollie" width="90" class="img-fluid">
                    Pay with Mollie
                  </label>
                </div>
                </li>
                <li>
                  <div class="input-checkbox">
                  <input type="radio" value="amarpay" id="amarpay" name="payment">
                  <label for="amarpay">
                    <img src="https://yoori.spagreen.net/public/images/payment-method/amarpay.svg" alt="paypal" class="img-fluid">
                    Pay with Amar Pay
                  </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                    <input type="radio" value="skrill" id="skrill" name="payment">
                    <label for="skrill">
                      <img src="https://yoori.spagreen.net/public/images/payment-method/skrill.svg" alt="paypal" class="img-fluid">
                      Pay with Amar Pay
                    </label>
                  </div>
                </li>
                <li>
                  <div class="input-checkbox">
                  <input type="radio" data-id="1" data-name="Offline - Bank Deposit" data-instructions="<p><b>Deposit to Bank</b></p><p>Bank Name: The City Bank Limited</p><p>Bank Account NO:&amp;nbsp;1502853184001</p><p>Branch:&amp;nbsp;Gulshan Avinue, Dhaka, Bangladesh</p><p>Routing No:&amp;nbsp;225261732</p>" id="offline_1" value="offline_method" name="payment">
                  <label for="offline_1">
                    <img src="https://yoori.spagreen.net/public/images/default/default-image-20x20.png" alt="Offline - Bank Deposit" class="img-fluid">
                    Offline - Bank Deposit
                  </label>
                  </div>
                </li>
              </ul>
            </div>
            {{-- End Card List --}}

          </div>
        </div>
        {{-- End col-lg-8 --}}

        <div class="col-lg-4">
          <div class="order-summary paymentCustom">
            <div class="peymentToggler">
              <div class="paymentHeader showHide">
                <h6>Price Details</h6>
                <div class="sg-card"></div>
              </div>
              <div class="paymentBTN-group">
                <div class="order-total sm-fixed-bottom">
                  <p>Total
                  <span>₹ 24.730,89</span></p>
                  <a href="javascript:void(0)" class="btn btn-primary paymentBTNFixed disable_btn">Pay Now</a>
                  <div class="div_btns d-none">
                    <a href="https://yoori.spagreen.net/stripe/redirect?trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns stripe_btn d-none"> Pay Now</a>
                    <a href="https://yoori.spagreen.net/user/payment/paytmRedirect?trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns d-none paytm_btn">Pay Now</a>
                    <a href="https://yoori.spagreen.net/get/ssl-response?payment_type=ssl_commerze&amp;trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns ssl_commerze_btn d-none"> Pay Now</a>
                    <a href="https://yoori.spagreen.net/amarpay/redirect?payment_type=amarpay&amp;trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns d-none amarpay_btn"> Pay Now</a>
                    <a href="https://yoori.spagreen.net/skrill/redirect?payment_type=skrill&amp;trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns d-none skrill_btn"> Pay Now</a>
                    <button class="btn btn-primary kkiapay-button paymentBTNFixed payment_btns d-none kkiapay_btn">Pay Now</button>
                    <a href="javascript:void(0)" class="btn btn-primary paymentBTNFixed payment_btns d-none paystack_btn">Pay Now</a>
                    <a href="https://yoori.spagreen.net/mollie/payment?trx_id=qLmW5AdpURePcCBT&amp;package_id=2" class="btn btn-primary paymentBTNFixed payment_btns d-none mollie_btn"> Pay Now</a>
                    <a href="#" class="btn btn-primary paymentBTNFixed payment_btns d-none flutter_wave_btn" data-toggle="modal" data-target="#fw_modal">Pay Now</a>
                    <button class="btn btn-primary paymentBTNFixed d-none loading" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                    </button>
                    <a href="javascript:void(0)" class="btn btn-primary paymentBTNFixed payment_btns d-none offline_method_btn" data-toggle="modal" data-target="#offline"> Pay Now
                    <span></span>
                    </a>
                  </div>
                  {{-- End Div_btns --}}

                  <div class="mx-auto w_40 payment_btns d-none paypal_btn" id="paypal-button-container">
                    <div id="zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda" class="paypal-buttons paypal-buttons-context-iframe paypal-buttons-label-unknown paypal-buttons-layout-vertical" data-paypal-smart-button-version="5.0.352" style="height: 0px; transition: all 0.2s ease-in-out 0s;">
                    <style nonce="">
                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda {
                          position: relative;
                          display: inline-block;
                          width: 100%;
                          min-height: 35px;
                          min-width: 200px;
                          max-width: 750px;
                          font-size: 0;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > iframe {
                          position: absolute;
                          top: 0;
                          left: 0;
                          width: 100%;
                          height: 100%;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > iframe.component-frame {
                          z-index: 100;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > iframe.prerender-frame {
                          transition: opacity .2s linear;
                          z-index: 200;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > iframe.visible {
                          opacity: 1;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > iframe.invisible {
                          opacity: 0;
                          pointer-events: none;
                      }

                      #zoid-paypal-buttons-uid_700b2854da_mdg6ntg6mda > .smart-menu {
                          position: absolute;
                          z-index: 300;
                          top: 0;
                          left: 0;
                          width: 100%;
                      }
                    </style>
                    <iframe allowtransparency="true"          name="__zoid__paypal_buttons__eyJzZW5kZXIiOnsiZG9tYWluIjoiaHR0cHM6Ly95b29yaS5zcGFncmVlbi5uZXQifSwibWV0YURhdGEiOnsid2luZG93UmVmIjp7InR5cGUiOiJwYXJlbnQiLCJkaXN0YW5jZSI6MH19LCJyZWZlcmVuY2UiOnsidHlwZSI6InJhdyIsInZhbCI6IntcInVpZFwiOlwiem9pZC1wYXlwYWwtYnV0dG9ucy11aWRfNzAwYjI4NTRkYV9tZGc2bnRnNm1kYVwiLFwiY29udGV4dFwiOlwiaWZyYW1lXCIsXCJ0YWdcIjpcInBheXBhbC1idXR0b25zXCIsXCJjaGlsZERvbWFpbk1hdGNoXCI6e1wiX190eXBlX19cIjpcInJlZ2V4XCIsXCJfX3ZhbF9fXCI6XCJcXFxcLnBheXBhbFxcXFwuKGNvbXxjbikoOlxcXFxkKyk/JFwifSxcInZlcnNpb25cIjpcIjEwXzFfMFwiLFwicHJvcHNcIjp7XCJvbkFwcHJvdmVcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9lYTVjY2JmOGZlX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJvbkFwcHJvdmVcIn19LFwiY3JlYXRlT3JkZXJcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF8yNjY3OTc5YzVkX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJjcmVhdGVPcmRlclwifX0sXCJjc3BOb25jZVwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJmdW5kaW5nU291cmNlXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcInN0eWxlXCI6e1wiY3VzdG9tXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImxhYmVsXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImxheW91dFwiOlwidmVydGljYWxcIixcImNvbG9yXCI6XCJnb2xkXCIsXCJzaGFwZVwiOlwicmVjdFwiLFwidGFnbGluZVwiOmZhbHNlLFwiaGVpZ2h0XCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcInBlcmlvZFwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJtZW51UGxhY2VtZW50XCI6XCJiZWxvd1wifSxcInN0b3JhZ2VTdGF0ZVwiOntcImdldFwiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkXzhhNWNjMTZhYmVfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImdldFwifX0sXCJzZXRcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9iOWVlNTE0YTgzX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJzZXRcIn19fSxcInNlc3Npb25TdGF0ZVwiOntcImdldFwiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkX2U5ZjQ4MGFjMGNfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImdldFwifX0sXCJzZXRcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9jYzFmNWM5OGNhX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJzZXRcIn19fSxcImNvbXBvbmVudHNcIjpbXCJidXR0b25zXCJdLFwibG9jYWxlXCI6e1wiY291bnRyeVwiOlwiVVNcIixcImxhbmdcIjpcImVuXCJ9LFwiY3JlYXRlQmlsbGluZ0FncmVlbWVudFwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJjcmVhdGVTdWJzY3JpcHRpb25cIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwib25Db21wbGV0ZVwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJvblNoaXBwaW5nQ2hhbmdlXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcIm9uU2hpcHBpbmdBZGRyZXNzQ2hhbmdlXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcIm9uU2hpcHBpbmdPcHRpb25zQ2hhbmdlXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcIm9uQ2FuY2VsXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcIm9uQ2xpY2tcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiZ2V0UHJlcmVuZGVyRGV0YWlsc1wiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkXzA5MmEzNzY1ZDJfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImdldFByZXJlbmRlckRldGFpbHNcIn19LFwiZ2V0UG9wdXBCcmlkZ2VcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF8xNjExYTVkZmM5X21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJnZXRQb3B1cEJyaWRnZVwifX0sXCJvbkluaXRcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9mMGY3OGYyOTBiX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJvbkluaXRcIn19LFwiZ2V0UXVlcmllZEVsaWdpYmxlRnVuZGluZ1wiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkX2I0YzAwOTg2ZjNfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImdldFF1ZXJpZWRFbGlnaWJsZUZ1bmRpbmdcIn19LFwiY2xpZW50SURcIjpcIkFaeHlLeEpvX09nYzdqWURlbGxDdUVvZ3dZYmtGVmRJWFlHbUNhandnYmtCZS1Xb2RsbHM4anBsVXpaQW1YSHh4bXhoV0I5eEpxMUw3OVYxXCIsXCJjbGllbnRBY2Nlc3NUb2tlblwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJwYXJ0bmVyQXR0cmlidXRpb25JRFwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJtZXJjaGFudFJlcXVlc3RlZFBvcHVwc0Rpc2FibGVkXCI6ZmFsc2UsXCJlbmFibGVUaHJlZURvbWFpblNlY3VyZVwiOmZhbHNlLFwic2RrQ29ycmVsYXRpb25JRFwiOlwiZjY0NjQyMDliODgyMlwiLFwic3RvcmFnZUlEXCI6XCJ1aWRfMjNiZWYwMDgwMF9tZHU2bWphNm1kcVwiLFwic2Vzc2lvbklEXCI6XCJ1aWRfMjVjNDg5N2RjNl9tZGc2bnRlNm10aVwiLFwiYnV0dG9uTG9jYXRpb25cIjpcInlvb3JpLnNwYWdyZWVuLm5ldFwiLFwiYnV0dG9uU2Vzc2lvbklEXCI6XCJ1aWRfYzUyNzFhYzAzYV9tZGc2bnRnNm1kYVwiLFwiZW5hYmxlVmF1bHRcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiZW52XCI6XCJzYW5kYm94XCIsXCJhbW91bnRcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwic3RhZ2VIb3N0XCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImJ1dHRvblNpemVcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiYXBpU3RhZ2VIb3N0XCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImZ1bmRpbmdFbGlnaWJpbGl0eVwiOntcInBheXBhbFwiOntcImVsaWdpYmxlXCI6dHJ1ZSxcInZhdWx0YWJsZVwiOnRydWV9LFwicGF5bGF0ZXJcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJwcm9kdWN0c1wiOntcInBheUluM1wiOntcImVsaWdpYmxlXCI6ZmFsc2UsXCJ2YXJpYW50XCI6bnVsbH0sXCJwYXlJbjRcIjp7XCJlbGlnaWJsZVwiOmZhbHNlLFwidmFyaWFudFwiOm51bGx9LFwicGF5bGF0ZXJcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJ2YXJpYW50XCI6bnVsbH19fSxcImNhcmRcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJicmFuZGVkXCI6dHJ1ZSxcImluc3RhbGxtZW50c1wiOmZhbHNlLFwidmVuZG9yc1wiOntcInZpc2FcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJ2YXVsdGFibGVcIjp0cnVlfSxcIm1hc3RlcmNhcmRcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJ2YXVsdGFibGVcIjp0cnVlfSxcImFtZXhcIjp7XCJlbGlnaWJsZVwiOnRydWUsXCJ2YXVsdGFibGVcIjp0cnVlfSxcImRpc2NvdmVyXCI6e1wiZWxpZ2libGVcIjp0cnVlLFwidmF1bHRhYmxlXCI6dHJ1ZX0sXCJoaXBlclwiOntcImVsaWdpYmxlXCI6ZmFsc2UsXCJ2YXVsdGFibGVcIjpmYWxzZX0sXCJlbG9cIjp7XCJlbGlnaWJsZVwiOmZhbHNlLFwidmF1bHRhYmxlXCI6dHJ1ZX0sXCJqY2JcIjp7XCJlbGlnaWJsZVwiOmZhbHNlLFwidmF1bHRhYmxlXCI6dHJ1ZX19LFwiZ3Vlc3RFbmFibGVkXCI6ZmFsc2V9LFwidmVubW9cIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcIml0YXVcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcImNyZWRpdFwiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwiYXBwbGVwYXlcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcInNlcGFcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcImlkZWFsXCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJiYW5jb250YWN0XCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJnaXJvcGF5XCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJlcHNcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcInNvZm9ydFwiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwibXliYW5rXCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJwMjRcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcInppbXBsZXJcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcIndlY2hhdHBheVwiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwicGF5dVwiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwiYmxpa1wiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwidHJ1c3RseVwiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwib3h4b1wiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwibWF4aW1hXCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJib2xldG9cIjp7XCJlbGlnaWJsZVwiOmZhbHNlfSxcImJvbGV0b2JhbmNhcmlvXCI6e1wiZWxpZ2libGVcIjpmYWxzZX0sXCJtZXJjYWRvcGFnb1wiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwibXVsdGliYW5jb1wiOntcImVsaWdpYmxlXCI6ZmFsc2V9LFwic2F0aXNwYXlcIjp7XCJlbGlnaWJsZVwiOmZhbHNlfX0sXCJwbGF0Zm9ybVwiOlwiZGVza3RvcFwiLFwicmVtZW1iZXJlZFwiOltdLFwiZXhwZXJpbWVudFwiOntcImVuYWJsZVZlbm1vXCI6ZmFsc2UsXCJlbmFibGVWZW5tb0FwcExhYmVsXCI6ZmFsc2V9LFwicGF5bWVudFJlcXVlc3RcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiZmxvd1wiOlwicHVyY2hhc2VcIixcInJlbWVtYmVyXCI6e1wiX190eXBlX19cIjpcImNyb3NzX2RvbWFpbl9mdW5jdGlvblwiLFwiX192YWxfX1wiOntcImlkXCI6XCJ1aWRfMTVmZjA5ZDdmMF9tZGc2bnRnNm1kYVwiLFwibmFtZVwiOlwicmVtZW1iZXJcIn19LFwiY3VycmVuY3lcIjpcIlVTRFwiLFwiaW50ZW50XCI6XCJjYXB0dXJlXCIsXCJidXllckNvdW50cnlcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiY29tbWl0XCI6dHJ1ZSxcInZhdWx0XCI6ZmFsc2UsXCJlbmFibGVGdW5kaW5nXCI6W10sXCJkaXNhYmxlRnVuZGluZ1wiOltdLFwiZGlzYWJsZUNhcmRcIjpbXSxcIm1lcmNoYW50SURcIjpbXSxcInJlbmRlcmVkQnV0dG9uc1wiOltcInBheXBhbFwiLFwicGF5bGF0ZXJcIixcImNhcmRcIl0sXCJjc3BcIjp7XCJub25jZVwiOlwiXCJ9LFwibm9uY2VcIjpcIlwiLFwiZ2V0UGFnZVVybFwiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkXzZmNzViNjQ0NjRfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImdldFBhZ2VVcmxcIn19LFwidXNlcklEVG9rZW5cIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwiY2xpZW50TWV0YWRhdGFJRFwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJkZWJ1Z1wiOmZhbHNlLFwidGVzdFwiOntcImFjdGlvblwiOlwiY2hlY2tvdXRcIn0sXCJ3YWxsZXRcIjp7XCJfX3R5cGVfX1wiOlwidW5kZWZpbmVkXCJ9LFwicGF5bWVudE1ldGhvZE5vbmNlXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcInBheW1lbnRNZXRob2RUb2tlblwiOntcIl9fdHlwZV9fXCI6XCJ1bmRlZmluZWRcIn0sXCJicmFuZGVkXCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImFwcGxlUGF5U3VwcG9ydFwiOmZhbHNlLFwic3VwcG9ydHNQb3B1cHNcIjp0cnVlLFwic3VwcG9ydGVkTmF0aXZlQnJvd3NlclwiOmZhbHNlLFwidXNlckV4cGVyaWVuY2VGbG93XCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImFwcGxlUGF5XCI6e1wiX190eXBlX19cIjpcInVuZGVmaW5lZFwifSxcImV4cGVyaWVuY2VcIjpcIlwiLFwiYWxsb3dCaWxsaW5nUGF5bWVudHNcIjp0cnVlfSxcImV4cG9ydHNcIjp7XCJpbml0XCI6e1wiX190eXBlX19cIjpcImNyb3NzX2RvbWFpbl9mdW5jdGlvblwiLFwiX192YWxfX1wiOntcImlkXCI6XCJ1aWRfNTZiZTgzMDBjMl9tZGc2bnRnNm1kYVwiLFwibmFtZVwiOlwiaW5pdFwifX0sXCJjbG9zZVwiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkXzk0Nzc2NmE2NzlfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImNsb3NlOjptZW1vaXplZFwifX0sXCJjaGVja0Nsb3NlXCI6e1wiX190eXBlX19cIjpcImNyb3NzX2RvbWFpbl9mdW5jdGlvblwiLFwiX192YWxfX1wiOntcImlkXCI6XCJ1aWRfOGI3Y2U0ZDBjNl9tZGc2bnRnNm1kYVwiLFwibmFtZVwiOlwiY2hlY2tDbG9zZVwifX0sXCJyZXNpemVcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF84YjVhZTYwYWUxX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJOZVwifX0sXCJvbkVycm9yXCI6e1wiX190eXBlX19cIjpcImNyb3NzX2RvbWFpbl9mdW5jdGlvblwiLFwiX192YWxfX1wiOntcImlkXCI6XCJ1aWRfYjNlNzBmYjI4N19tZGc2bnRnNm1kYVwiLFwibmFtZVwiOlwiQmVcIn19LFwic2hvd1wiOntcIl9fdHlwZV9fXCI6XCJjcm9zc19kb21haW5fZnVuY3Rpb25cIixcIl9fdmFsX19cIjp7XCJpZFwiOlwidWlkX2RjMDUyNmExYzFfbWRnNm50ZzZtZGFcIixcIm5hbWVcIjpcImhlXCJ9fSxcImhpZGVcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9iNzIyMDQwNDRiX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJnZVwifX0sXCJleHBvcnRcIjp7XCJfX3R5cGVfX1wiOlwiY3Jvc3NfZG9tYWluX2Z1bmN0aW9uXCIsXCJfX3ZhbF9fXCI6e1wiaWRcIjpcInVpZF9hZDJiMzgwOGJlX21kZzZudGc2bWRhXCIsXCJuYW1lXCI6XCJVZVwifX19fSJ9fQ__" title="PayPal" allowpaymentrequest="allowpaymentrequest" scrolling="no" id="jsx-iframe-eb0657551e" class="component-frame visible" style="background-color: transparent; border: none;">
                    </iframe>
                    <div id="smart-menu" class="smart-menu"></div>
                    <div id="installments-modal" class="installments-modal"></div>
                    <iframe name="__detect_close_uid_6997829ed9_mdg6ntg6mda__" style="display: none;"></iframe>
                    </div>
                  </div>

                  <form name="jsform" class="d-none jazz_cash_btn payment_btns" action="https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/" method="POST">
                    <input type="hidden" name="pp_Version" value="1.1">
                    <input type="hidden" name="pp_TxnType" value="MIGS">
                    <input type="hidden" name="pp_Language" value="EN">
                    <input type="hidden" name="pp_MerchantID" value="MC34318">
                    <input type="hidden" name="pp_SubMerchantID" value="">
                    <input type="hidden" name="pp_Password" value="8h484tw2t8">
                    <input type="hidden" name="pp_BankID" value="TBANK">
                    <input type="hidden" name="pp_ProductID" value="RETL">
                    <input type="hidden" name="pp_IsRegisteredCustomer" value="No">
                    <input type="hidden" name="pp_TokenizedCardNumber" value="">
                    <input type="hidden" name="pp_TxnRefNo" value="T20230212150113">
                    <input type="hidden" name="pp_Amount" value="50000">
                    <input type="hidden" name="pp_TxnCurrency" value="PKR">
                    <input type="hidden" name="pp_TxnDateTime" value="20230212150113">
                    <input type="hidden" name="pp_BillReference" value="billRef">
                    <input type="hidden" name="pp_Description" value="Description of transaction">
                    <input type="hidden" name="pp_TxnExpiryDateTime" value="20230212160113">
                    <input type="hidden" name="pp_ReturnURL" value="https://yoori.spagreen.net/user/complete-order/{id}">
                    <input type="hidden" name="pp_SecureHash" value="d2ceb61af5b7e0801e51d82b300f0bae2bd030bc9432bc9a650c8c2d8f8b7e28">
                    <input type="hidden" name="ppmpf_1" value="1">
                    <input type="hidden" name="ppmpf_2" value="2">
                    <input type="hidden" name="ppmpf_3" value="3">
                    <input type="hidden" name="ppmpf_4" value="4">
                    <input type="hidden" name="ppmpf_5" value="5">
                    <input type="hidden" name="pp_CustomerID" value="Test">
                    <input type="hidden" name="pp_CustomerEmail" value="test@gmail.com">
                    <input type="hidden" name="pp_MobileNumber" value="03123456789">
                    <input type="hidden" name="pp_CINIC" value="345678">
                    <button type="submit" class="btn btn-primary paymentBTNFixed jazz_btn">Pay Now</button>
                  </form>

                  <form action="https://yoori.spagreen.net/seller/complete-purchase?expires=1676194274&amp;package_id=2&amp;response=yes&amp;trx_id=qQqkBmDyYahuIowt&amp;user_id=2&amp;signature=cc6314d016be62c23f356fee1f3a2705d9bf5b4ce0bda9e2501d2e7090a350cf" method="post">
                    <input type="hidden" name="_token" value="7R9Gw6ialXtCwOc1UkI6DLI7qS9q77MZf5QTuMR4"> <input type="hidden" name="trx_id" value="qQqkBmDyYahuIowt">
                    <input type="hidden" name="payment_type" value="razor_pay">
                    <input type="hidden" name="amount" value="300">
                    <div id="razor_pay_btn_append"></div>
                    <script type="text/javascript" language="javascript" data-key="rzp_test_0TxiJynxZFTbwx" data-amount="2473089" data-name="Yoori e-Commerce CMS" data-description="Razorpay" data-image="https://yoori.spagreen.net" data-prefill.name="" data-prefill.email="" data-prefill.address="" data-theme.color="#fcb800" src="https://yoori.spagreen.net/public/frontend/js/razor_pay_checkout.js"></script>
                    <input type="submit" value="Pay Now" class="razorpay-payment-button">
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


</body>
</html>
