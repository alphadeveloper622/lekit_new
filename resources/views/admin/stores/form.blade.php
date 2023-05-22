@extends('admin.partials.master')

@php
    $route = isset($user) ? route('admin.store.update') : route('admin.store.store');
    $title = isset($user) ? __('Edit') : __('Add');
    $button_name = isset($user) ? __('Update Store') : __('Add Store');
@endphp

@section('title')
    {{ $title }} {{ __('Store') }}
@endsection
@section('stores_active')
    active
@endsection
@section('stores')
    active
@endsection

@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ $title }} {{ __('store') }}</h2>
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
                                <h4>{{ __('Store Details') }}</h4>
                            </div>
                            <div class="card-body card-body-paddding phone-block">
                                <div class="form-group">
                                    <label for="seller_id">{{ __('Seller') }} *</label>
                                    <select class="form-control select2" name="seller_id" id="seller_id">
                                        @foreach($sellers as $key => $seller)
                                            <option value="{{ $seller->sellerProfile->id }}" {{ old('seller_id') ? (old('seller_id') == $seller->sellerProfile->id ? 'selected' : '') : (@$user->storeProfile->seller_id == $seller->sellerProfile->id ? 'selected' : '')}}>
                                                {{ $seller->sellerProfile->company_name }}
                                            </option>                                            
                                        @endforeach
                                    </select>
                                    @if ($errors->has('seller_id'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('seller_id') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="store_name">{{ __('Store Name') }} *</label>
                                        <input type="text" name="store_name" id="store_name" class="form-control"
                                            placeholder="{{__('Store Name')}}"
                                            value="{{ old('store_name') ? old('store_name') : @$user->storeProfile->store_name }}">
                                        @if ($errors->has('store_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('store_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="store_code">{{ __('Store Code') }} *</label>
                                        <input type="text" name="store_code" id="store_code" class="form-control"
                                            placeholder="{{__('Store Code')}}"
                                            value="{{ old('store_code') ? old('store_code') : @$user->storeProfile->store_code }}">
                                        @if ($errors->has('store_code'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('store_code') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <label for="address">{{ __('Address') }} *</label>
                                    <input type="text" id="address" name="address" placeholder="{{__('Address')}}"
                                           value="{{ old('address') ? old('address') : @$user->storeProfile->address }}"
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
                                               value="{{ old('postcode') ? old('postcode') : @$user->storeProfile->postcode }}"
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
                                               value="{{ old('city') ? old('city') : @$user->storeProfile->city }}"
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
                                                                            'name' => 'store_phone',
                                                                            'value' => old('store_phone') ? : @$user->storeProfile->store_phone,
                                                                            'label' => __('Store Telephone'),
                                                                            'class' => 'form-control',
                                                                            'id' => 'txtPhone',
                                                                            'country_id_field' => 'country_id',
                                                                            'country_id' => old('country_id') ? : (@$user->country_id ?? settingHelper('default_country'))
                                                                            ])
                                </div>

                                <div class="form-group">
                                    <label for="store_email">{{ __('Store Email') }} *</label>
                                    <input type="text" name="store_email" id="store_email" class="form-control"
                                        placeholder="{{__('Store Email')}}"
                                        value="{{ old('store_email') ? old('store_email') : @$user->storeProfile->store_email }}">
                                    @if ($errors->has('store_email'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('store_email') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row">                                    
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="latitude">{{ __('Latitude') }} *</label>
                                        <input type="number" id="latitude" name="latitude" step="any"
                                               placeholder="{{__('Latitude')}}"
                                               value="{{ old('latitude') ? old('latitude') : @$user->storeProfile->latitude }}"
                                               class="form-control">
                                        @if ($errors->has('latitude'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('latitude') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-xs-12 col-md-6">
                                        <label for="longitude">{{ __('Longitude') }} *</label>
                                        <input type="number" id="longitude" name="longitude" step="any"
                                               placeholder="{{__('Longitude')}}"
                                               value="{{ old('longitude') ? old('longitude') : @$user->storeProfile->longitude }}"
                                               class="form-control">
                                        @if ($errors->has('longitude'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('longitude') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="store_description">{{__('Store Description')}} *</label>
                                    <textarea class="form-control" name="store_description" id="store_description"
                                              value="{{old('store_description')}}"
                                              placeholder="{{__('Store Description')}}">{{ @$user->storeProfile->store_description }}</textarea>
                                    @if ($errors->has('store_description'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('store_description') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row mt-2">
                                    <label class="col-md-3 col-from-label">{{ __('Status') }}</label>
                                    <div class="col-md-9">
                                        <label class="custom-switch">
                                            <input type="checkbox" value="1" name="status"
                                                    {{ old('status') ? (old('status') == 1 ? 'checked' : '') : (@$user->storeProfile->status ? (@$user->storeProfile->status == 1 ? 'checked' : '') : 'checked') }}
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

                                <div class="form-group">
                                    <label for="store_description">{{__('Store Opening Hours')}} *</label>
                                    <div class="d-flex align-items-center">
                                        <label style="width: 300px">{{__('Monday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[0] ? @$user->storeProfile->opening_hours[0]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[0] ? @$user->storeProfile->opening_hours[0]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed0"
                                                    {{ old('is_closed0') ? (old('is_closed0') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[0] ? (@$user->storeProfile->opening_hours[0]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Tuesday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[1] ? @$user->storeProfile->opening_hours[1]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[1] ? @$user->storeProfile->opening_hours[1]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed1"
                                            {{ old('is_closed1') ? (old('is_closed1') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[1] ? (@$user->storeProfile->opening_hours[1]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Wednesday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[2] ? @$user->storeProfile->opening_hours[2]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[2] ? @$user->storeProfile->opening_hours[2]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed2"
                                            {{ old('is_closed2') ? (old('is_closed2') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[2] ? (@$user->storeProfile->opening_hours[2]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Thursday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[3] ? @$user->storeProfile->opening_hours[3]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[3] ? @$user->storeProfile->opening_hours[3]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed3"
                                            {{ old('is_closed3') ? (old('is_closed3') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[3] ? (@$user->storeProfile->opening_hours[3]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Friday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[4] ? @$user->storeProfile->opening_hours[4]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[4] ? @$user->storeProfile->opening_hours[4]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed4"
                                            {{ old('is_closed4') ? (old('is_closed4') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[4] ? (@$user->storeProfile->opening_hours[4]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Saturday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[5] ? @$user->storeProfile->opening_hours[5]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[5] ? @$user->storeProfile->opening_hours[5]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed5"
                                            {{ old('is_closed5') ? (old('is_closed5') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[5] ? (@$user->storeProfile->opening_hours[5]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <label style="width: 300px">{{__('Sunday')}}:</label>
                                        <div class="input-group date store-opening-time mr-1">
                                            <input type="text" name="open_time[]" value="{{ @$user->storeProfile->opening_hours[6] ? @$user->storeProfile->opening_hours[6]['open'] : '09:00 AM' }}" class="form-control" placeholder="{{__('Open Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group date store-opening-time">
                                            <input type="text" name="close_time[]" value="{{ @$user->storeProfile->opening_hours[6] ? @$user->storeProfile->opening_hours[6]['close'] : '06:00 PM' }}" class="form-control" placeholder="{{__('Close Time')}}" title="" required />
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-switch ml-4">
                                            <input type="checkbox" value="1" name="is_closed6"
                                            {{ old('is_closed6') ? (old('is_closed6') == 1 ? 'checked' : '') : (@$user->storeProfile->opening_hours[6] ? (@$user->storeProfile->opening_hours[6]['is_closed'] == 1 ? 'checked' : '') : 'checked') }}
                                                    class="custom-switch-input digital-product">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                       
                                <div class="form-group">
                                    <label for="store_logo">{{ __('Logo') }} ({{ __('320*320') }})</label>
                                    <div class="form-group">
                                        <input type="file" id="store_logo"
                                               class="custom-file-input image_pick file-select" data-image-for="logo"
                                               name="logo" id="customFile"
                                               value="" accept="image/*"/>
                                    </div>

                                    <div>
                                        @if(@$user->storeProfile->logo !=[] && is_file_exists(@$user->storeProfile->logo['image_72x72']))
                                            <img src="{{ static_asset(@$user->storeProfile->logo['image_72x72'])}}"
                                                 alt="" id="img_logo" class="img-thumbnail site-icon">
                                        @else
                                            <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                 alt="{{ @$user->first_name }}" id="img_logo"
                                                 class="img-thumbnail site-icon ">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group seo-image-positoin">
                                    <label for="store_main_banner">{{ __('Main Banner') }} ({{ __('1300*400') }})</label>
                                    <div class="form-group">
                                        <input type="file" id="store_main_banner"
                                               class="custom-file-input image_pick file-select" data-image-for="main_banner"
                                               name="main_banner"
                                               value="{{ @$user->image_id}}" accept="image/*"/>
                                    </div>
                                    <div>
                                        @if(@$user->storeProfile->main_banner !=[] && is_file_exists(@$user->storeProfile->main_banner['image_72x72']))
                                            <img src="{{ static_asset(@$user->storeProfile->main_banner['image_72x72'])}}"
                                                 id="img_main_banner" alt="" class="img-thumbnail site-icon">
                                        @else
                                            <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                 alt="{{ @$user->first_name }}" id="img_main_banner"
                                                 class="img-thumbnail site-icon ">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group seo-image-positoin">
                                    <label for="store_banner">{{ __('Banner') }} ({{ __('1900*625') }})</label>
                                    <div class="form-group">
                                        <input type="file" id="store_banner"
                                               class="custom-file-input image_pick file-select" data-image-for="banner"
                                               name="banner"
                                               value="{{ @$user->image_id}}" accept="image/*"/>
                                    </div>
                                    <div>
                                        @if(@$user->storeProfile->banner !=[] && is_file_exists(@$user->storeProfile->banner['image_72x72']))
                                            <img src="{{ static_asset(@$user->storeProfile->banner['image_72x72'])}}"
                                                 id="img_banner" alt="" class="img-thumbnail site-icon">
                                        @else
                                            <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                 alt="{{ @$user->first_name }}" id="img_banner"
                                                 class="img-thumbnail site-icon ">
                                        @endif
                                    </div>
                                </div>

                                
                                                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-xs-12 col-md-6">
                        <div class="card">
                            <div class="card-header input-title" id="Add">
                                <h4>{{ __('Other Info') }}</h4>
                            </div>
                            <div class="card-body card-body-paddding">
                                <div class="form-group">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                        placeholder="{{__('Facebook')}}"
                                        value="{{ old('facebook') ? old('facebook') : @$user->storeProfile->facebook }}">
                                    @if ($errors->has('facebook'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('facebook') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="youtube">{{ __('Youtube') }}</label>
                                    <input type="text" name="youtube" id="youtube" class="form-control"
                                        placeholder="{{__('Youtube')}}"
                                        value="{{ old('youtube') ? old('youtube') : @$user->storeProfile->youtube }}">
                                    @if ($errors->has('youtube'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('youtube') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="twitter">{{ __('Twitter') }}</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control"
                                        placeholder="{{__('Twitter')}}"
                                        value="{{ old('twitter') ? old('twitter') : @$user->storeProfile->twitter }}">
                                    @if ($errors->has('twitter'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('twitter') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="linkedin">{{ __('Linkedin') }}</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                                        placeholder="{{__('Linkedin')}}"
                                        value="{{ old('linkedin') ? old('linkedin') : @$user->storeProfile->linkedin }}">
                                    @if ($errors->has('linkedin'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('linkedin') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="instagram">{{ __('Instagram') }}</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                        placeholder="{{__('Instagram')}}"
                                        value="{{ old('instagram') ? old('instagram') : @$user->storeProfile->instagram }}">
                                    @if ($errors->has('instagram'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('instagram') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="store_comments">{{__('Store Comments')}}</label>
                                    <textarea class="form-control" name="store_comments" id="store_comments"
                                              value="{{old('store_comments')}}"
                                              placeholder="{{__('Comments')}}">{{ @$user->storeProfile->store_comments }}</textarea>
                                    @if ($errors->has('store_comments'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('store_comments') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header input-title" id="Add">
                                <h4>{{ __('Store Manger Info') }}</h4>
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
                                    <label for="email">{{ __('Email') }} *</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="{{__('Email')}}"
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
                                                                            'label' => __('Telephone'),
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
                                    <label for="category">{{ __('Category') }} *</label>
                                    <select class="form-control select2" name="category" id="category">
                                        @foreach($categories as $key => $category)
                                            <option
                                                    value="{{ $category->id }}" {{ $selected_category == $category->id ? 'selected' : ''}}>{{ $category->getTranslation('title', App::getLocale()) }}</option>
                                            @foreach ($category->childCategories as $childCategory)
                                                @include('admin.stores.categories.child-categories', ['child_category' => $childCategory , 'parent' => old('category'),'product' => true])
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="store_id" value="">    
                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('category') }}</p>
                                        </div>
                                    @endif
                                </div> 
                                <div class="form-group d-flex">
                                    <a  class="btn btn-outline-secondary mr-1  gallery-modal mr-auto" data-type="gallery">
                                        {{ __('Gallery') }}
                                    </a>
                                    <!-- <a  class="btn btn-outline-secondary mr-1">
                                            {{ __('Reviews') }}
                                    </a> -->
                                    <a  class="btn btn-outline-secondary mr-auto" href="{{ route('categories') }}">
                                        {{ __('Categories') }}
                                    </a>
                                    <button type="submit" class="btn btn-outline-primary">
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
    @include('admin.common.selector-modal',['modal_state' => 'gallery'])

@endsection
@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ static_asset('admin/css/bootstrap-datetimepicker.min.css') }}">

@endsection
@push('page-script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ static_asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ static_asset('admin/js/countries.js') }}"></script>
    <script>

        $(document).ready(function () {
            
            $('.store-opening-time').datetimepicker({
                "allowInputToggle": true,
                "showClose": true,
                "showClear": true,
                "showTodayButton": true,
                "format": "hh:mm A",
            });

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
