@extends('admin.partials.master')

@php
    $route = isset($user) ? route('admin.seller.update') : route('admin.seller.store');
    $title = isset($user) ? __('Edit') : __('Add');
    $button_name = isset($user) ? __('Update Seller') : __('Add Seller');
@endphp

@section('title')
    {{ $title }} {{ __('Seller') }}
@endsection
@section('sellers_active')
    active
@endsection
@section('sellers')
    active
@endsection

@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ $title }} {{ __('seller') }}</h2>
                </div>
                <div class="buttons add-button">
                    <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}"
                       class="btn btn-icon icon-left btn-outline-primary"><i
                                class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <form action="{{ $route }}" enctype="multipart/form-data" method="POST">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-sm-xs-12 col-md-6">
                        <div class="card">
                            <div class="card-header input-title" id="Add">
                                <h4>{{ __('Company Info') }}</h4>
                            </div>
                            <div class="card-body card-body-paddding phone-block">
                                <div class="form-group">
                                    <label for="company_name">{{ __('Company Name') }} *</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                           placeholder="{{__('Company Name')}}"
                                           value="{{ old('company_name') ? old('company_name') : @$user->sellerProfile->company_name }}">
                                    @if ($errors->has('company_name'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('company_name') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mt-4 text-center">
                                    @if (@$user->sellerProfile->logo !=[] && is_file_exists(@$user->sellerProfile->logo['image_320x320']))
                                        <img src="{{ static_asset(@$user->sellerProfile->logo['image_320x320']) }}"
                                             alt="" id="img_logo"
                                             class="img-thumbnail user-profile ">
                                    @else
                                        <img src="{{ static_asset('images/default/default-image-320x320.png') }}"
                                             alt="{{ @$user->company_name }}" id="img_logo"
                                             class="img-thumbnail user-profile ">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Company Logo') }}</label>
                                    <div class="form-group">
                                        <input type="file" class="custom-file-input image_pick file-select"
                                               data-image-for="logo" name="logo" id="logo"
                                               value="" accept="image/*"/>
                                        @if ($errors->has('logo'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('logo') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">{{ __('Address') }} </label>
                                    <input type="text" id="address" name="address" placeholder="{{__('Address')}}"
                                           value="{{ old('address') ? old('address') : @$user->sellerProfile->address }}"
                                           class="form-control">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('address') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="postcode">{{ __('Postcode') }}</label>
                                        <input type="text" id="postcode" name="postcode"
                                               placeholder="{{__('Postcode')}}"
                                               value="{{ old('postcode') ? old('postcode') : @$user->sellerProfile->postcode }}"
                                               class="form-control">
                                        @if ($errors->has('postcode'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('postcode') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="city">{{ __('City') }}</label>
                                        <input type="text" id="city" name="city"
                                               placeholder="{{__('City')}}"
                                               value="{{ old('city') ? old('city') : @$user->sellerProfile->city }}"
                                               class="form-control">
                                        @if ($errors->has('city'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('city') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    @include('admin.partials.tel-input',[
                                                                            'name' => 'company_phone',
                                                                            'value' => old('company_phone') ? : @$user->sellerProfile->phone_no,
                                                                            'label' => __('Company Telephone'),
                                                                            'class' => 'form-control',
                                                                            'id' => 'txtPhone',
                                                                            'country_id_field' => 'country_id',
                                                                            'country_id' => old('country_id') ? : (@$user->country_id ?? settingHelper('default_country'))
                                                                            ])
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="company_email">{{ __('Company Email') }} *</label>
                                        <input type="text" name="company_email" id="company_email" class="form-control"
                                            placeholder="{{__('Company Email')}}"
                                            value="{{ old('company_email') ? old('company_email') : @$user->sellerProfile->company_email }}">
                                        @if ($errors->has('company_email'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('company_email') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="company_number">{{ __('Company Number') }}</label>
                                        <input type="text" id="company_number" name="company_number"
                                               placeholder="{{__('Company Number')}}"
                                               value="{{ old('company_number') ? old('company_number') : @$user->sellerProfile->license_no }}"
                                               class="form-control">
                                        @if ($errors->has('company_number'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('company_number') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="company_website">{{ __('Company Website') }}</label>
                                        <input type="text" id="company_website" name="company_website"
                                               placeholder="{{__('Company Website')}}"
                                               value="{{ old('company_website') ? old('company_website') : @$user->sellerProfile->company_website }}"
                                               class="form-control">
                                        @if ($errors->has('company_website'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('company_website') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                

                                <div class="form-row">                                    
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="company_type">{{ __('Company Type') }}</label>
                                        <input type="text" id="company_type" name="company_type"
                                               placeholder="{{__('Company Type')}}"
                                               value="{{ old('company_type') ? old('company_type') : @$user->sellerProfile->company_type }}"
                                               class="form-control">
                                        @if ($errors->has('company_type'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('company_type') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="number_employees">{{ __('Number of Employees') }}</label>
                                        <input type="number" id="number_employees" name="number_employees"
                                               placeholder="{{__('Number of Employees')}}"
                                               value="{{ old('number_employees') ? old('number_employees') : @$user->sellerProfile->number_employees }}"
                                               class="form-control">
                                        @if ($errors->has('number_employees'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('number_employees') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label class="col-md-3 col-from-label">{{ __('Status') }}</label>
                                    <div class="col-md-9">
                                        <label class="custom-switch">
                                            <input type="checkbox" value="1" name="status"
                                                    {{ old('status') ? (old('status') == 1 ? 'checked' : '') : (@$user->sellerProfile->status ? (@$user->sellerProfile->status == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                    class="custom-switch-description">{{ __("Active/Inactive") }}</span>
                                        </label>
                                        @if ($errors->has('is_digital'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('is_digital') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-xs-12 col-md-6">
                        <div class="card">
                            <div class="card-header input-title" id="Add">
                                <h4>{{ __('Director Details') }}</h4>
                            </div>
                            <div class="card-body card-body-paddding">
                                <div class="form-row">
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="first_name"> {{ __('First Name') }} *</label>
                                        <input type="hidden"
                                               value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}"
                                               name="r">
                                        <input type="hidden" value="{{ @$user->id }}" name="id">
                                        <input type="text" name="first_name" id="first_name"
                                               placeholder="{{__('First Name')}}"
                                               value="{{ old('first_name') ? old('first_name') : @$user->first_name }}"
                                               class="form-control">
                                        @if ($errors->has('first_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('first_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="last_name">{{ __('Last Name') }} *</label>
                                        <input type="text" id="last_name" name="last_name"
                                               placeholder="{{__('Last Name')}}"
                                               value="{{ old('last_name') ? old('last_name') : @$user->last_name }}"
                                               class="form-control">
                                        @if ($errors->has('last_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('last_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('Director Email') }} *</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="{{__('Director Email')}}"
                                        value="{{ old('email') ? old('email') : (isDemoServer() && isset($user->email) ? emailAddressMask($user->email) : @$user->email) }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('email') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    @include('admin.partials.tel-input',[
                                                                            'name' => 'phone',
                                                                            'value' => old('phone') ? : @$user->phone,
                                                                            'label' => __('Director Telephone'),
                                                                            'class' => 'form-control',
                                                                            'id' => 'txtPhone',
                                                                            'country_id_field' => 'country_id',
                                                                            'country_id' => old('country_id') ? : (@$user->country_id ?? settingHelper('default_country'))
                                                                            ])
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }} {{ !isset($user) ? '*' : ''  }}</label>
                                    <div class="input-group sohide_ico_pos" id="show_hide_password">
                                        <input type="password" id="password" name="password" class="form-control"
                                               placeholder="{{__('Password')}}"
                                        {{ isset($user) ? '' : 'required' }}">
                                        <div class="input-group-addon">
                                            <a href=""><i class='mdi mdi-eye-off' aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('password') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Confirm Password') }} </label>
                                    <div class="input-group sohide_ico_pos" id="show_hide_confirm_password">
                                        <input type="password" name="password_confirmation" class="form-control"
                                               placeholder="{{ __('Confirm Password')}}">
                                        <div class="input-group-addon">
                                            <a href=""><i class='mdi mdi-eye-off' aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('password_confirmation') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">{{__('Our Comments')}}</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              value="{{old('meta_description')}}"
                                              placeholder="{{__('Comments')}}">{{ @$user->sellerProfile->meta_description }}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('meta_description') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ $button_name }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('admin.common.selector-modal')

@endsection
@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('page-script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
    <script src="{{ static_asset('admin/js/countries.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', "#show_hide_password a", function (event) {
                event.preventDefault();
                let selector = $('#show_hide_password input');
                let type = selector.attr('type');
                if (type == "text") {
                    selector.attr('type', 'password');
                    $('#show_hide_password i').addClass("mdi-eye-off").removeClass("mdi-eye");
                } else if (type == "password") {
                    selector.attr('type', 'text');
                    $('#show_hide_password i').removeClass("mdi-eye-off").addClass("mdi-eye");
                }
            });
            $(document).on('click', "#show_hide_confirm_password a", function (event) {
                event.preventDefault();
                let selector = $('#show_hide_confirm_password input');
                let type = selector.attr('type');
                if (type == "text") {
                    selector.attr('type', 'password');
                    $('#show_hide_confirm_password i').addClass("mdi-eye-off").removeClass("mdi-eye");
                } else if (type == "password") {
                    selector.attr('type', 'text');
                    $('#show_hide_confirm_password i').removeClass("mdi-eye-off").addClass("mdi-eye");
                }
            });
        });
    </script>
@endpush
