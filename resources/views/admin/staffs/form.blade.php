@extends('admin.partials.master')

@php
    $route = isset($user) ? route('staffs.update') : route('staffs.store');
    $title = isset($user) ? __('Edit') : __('Add');
    $button_name = isset($user) ? __('Update') : __('Add');
@endphp


@section('title')
    {{ $title }} {{ __('Staff') }}
@endsection
@section('staff_active')
    active
@endsection
@section('staffs')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ $title }} {{ __('Staff') }}</h2>
                </div>
                <div class="buttons add-button">
                    <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}"
                       class="btn btn-icon icon-left btn-outline-primary"><i
                                class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <div class="col-sm-xs-12 col-md-12">
                <div class="card">
                    <form action="{{ $route }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card-body phone-block">
                                    <div class="form-group">
                                        <label for="first_name"> {{ __('First Name') }} *</label>
                                        <input type="hidden" value="{{ @$user->id }}" name="id">
                                        <input type="hidden"
                                               value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}"
                                               name="r">
                                        <input type="text" name="first_name" id="first_name"
                                               value="{{ old('first_name') ? old('first_name') : @$user->first_name }}"
                                               class="form-control" required>
                                        @if ($errors->has('first_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('first_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Last Name') }} *</label>
                                        <input type="text" id="last_name" name="last_name"
                                               value="{{ old('last_name') ? old('last_name') : @$user->last_name }}"
                                               class="form-control" required>
                                        @if ($errors->has('last_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('last_name') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        @include('admin.partials.tel-input',[
                                                                                'name' => 'phone',
                                                                                'value' => old('phone') ? : @$user->phone,
                                                                                'label' => __('Phone'),
                                                                                'class' => 'form-control',
                                                                                'id' => 'phone',
                                                                                'country_id_field' => 'country_id',
                                                                                'country_id' => old('country_id') ? : (@$user->country_id ?? settingHelper('default_country'))
                                                                                ])
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }} *</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                               value="{{ old('email') ? old('email') : @$user->email }}" required>
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('email') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }} {{ !isset($user) ? '*' : ''  }}</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                                {{ isset($user) ? '' : 'required' }}>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('password') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Confirm Password') }} </label>
                                        <div class="input-group sohide_ico_pos" id="show_hide_confirm_password">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password')}}">
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
                                        <label for="pickup_hub">{{ __('Pickup Hub') }}</label>
                                        <select class="form-control selectric" id="pickup_hub"
                                                name="pickup_hub" {{ @$user->pickupHub ? (@$user->pickupHub->user_id == @$user->pickup_hub_id) ? 'disabled' : '' : ''}}>
                                            <option value="">{{ __('Select') }} {{ __('Pickup hub') }}</option>
                                            @foreach ($hubs as $hub)
                                                <option value="{{ $hub->id }}" {{ old('role') == $hub->id ? 'selected' : (@$user->pickup_hub_id == $hub->id ? 'selected' : '') }}>{{ $hub->getTranslation('name', \App::getLocale()) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-4 text-center">
                                        @if (@$user->images != [] && @is_file_exists(@$user->images['image_128x128']))
                                            <img src="{{ static_asset($user->images['image_128x128']) }}"
                                                 alt="{{ @$user->first_name }}" id="img_profile"
                                                 class="img-thumbnail user-profile ">
                                        @else
                                            <img src="{{ static_asset('images/default/user.jpg') }}"
                                                 alt="{{ @$user->first_name }}" id="img_profile"
                                                 class="img-thumbnail user-profile ">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('Profile Image') }}</label>
                                        <div class="form-group">
                                            <input type="file" class="custom-file-input image_pick file-select"
                                                   accept="image/*" data-image-for="profile" name="image"
                                                   id="customFile"
                                                   value="{{ @$user->image_id }}"/>
                                            @if ($errors->has('image'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('image') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body card-body-paddding">
                                    <div class="form-group">
                                        <label for="role">{{ __('Role') }}</label>
                                        <select class="form-control change-role selectric" id="role" name="role">
                                            <option value="">{{ __('Select') }} {{ __('Role') }}</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : (@$user->role_id == $role->id ? 'selected' : '') }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="role__showHide pt-4 pb-4">
                                        <div class="accordion" id="staffRoleForm">
                                            @foreach($permissions as $permission)
                                                <div class="card">
                                                    <div class="card-header" id="heading_{{ $permission->id }}">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_{{ $permission->id }}"
                                                                    aria-expanded="false" aria-controls="collapseOne">
                                                                {{ __($permission->attribute) }}
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse_{{ $permission->id }}" class="collapse"
                                                        aria-labelledby="heading_{{ $permission->id }}"
                                                        data-parent="#staffRoleForm">
                                                        <div class="card-body">
                                                            @if($permission->attribute != 'wholesale_product' && $permission->attribute != 'refund' && $permission->attribute != 'reward_configuration' && $permission->attribute != 'otp_system'
                                                                                                        && $permission->attribute != 'offline_payment' && $permission->attribute != 'chat_messenger' && $permission->attribute != 'mobile_apps' && $permission->attribute != 'mobile_app_intro'
                                                                                                        && $permission->attribute != 'seller' && $permission->attribute != 'coupon')
                                                                @foreach ($permission->keywords as $key => $keyword)
                                                                    <div class="custom-control custom-checkbox">
                                                                        @if ($keyword != '')
                                                                            @if(old('permissions'))
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input read common-key"
                                                                                    id="{{ $keyword }}"
                                                                                    name="permissions[]"
                                                                                    value="{{ $keyword }}"
                                                                                        {{ in_array($keyword, old('permissions')) ? 'checked' : '' }}>
                                                                                <label class="custom-control-label"
                                                                                    style=""
                                                                                    for="{{ $keyword }}">{{ __($key) }}</label>
                                                                            @else
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input read common-key"
                                                                                    id="{{ $keyword }}"
                                                                                    name="permissions[]"
                                                                                    value="{{ $keyword }}"
                                                                                        {{ @$user->permissions ? (in_array($keyword, @$user->permissions) ? 'checked' : '') : '' }}>
                                                                                <label class="custom-control-label"
                                                                                    style=""
                                                                                    for="{{ $keyword }}">{{ __($key) }}</label>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @elseif(($permission->attribute == 'wholesale_product' && addon_is_activated('wholesale')) || ($permission->attribute == 'refund' && addon_is_activated('refund'))
                                                    || ($permission->attribute == 'reward_configuration' && addon_is_activated('reward')) || ($permission->attribute == 'otp_system' && addon_is_activated('otp_system'))
                                                    || ($permission->attribute == 'offline_payment' && addon_is_activated('offline_payment')) || ($permission->attribute == 'chat_messenger' && addon_is_activated('chat_messenger'))
                                                    || ($permission->attribute == 'mobile_apps'  || $permission->attribute == 'mobile_app_intro')
                                                    || ($permission->attribute == 'seller' && settingHelper('seller_system') == 1) || ($permission->attribute == 'coupon' && settingHelper('coupon_system') == 1))
                                                                @foreach ($permission->keywords as $k => $keyword)
                                                                    <div class="custom-control custom-checkbox">
                                                                        @if ($keyword != '')
                                                                            @if(old('permissions'))
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input read common-key"
                                                                                    id="{{ $keyword }}"
                                                                                    name="permissions[]"
                                                                                    value="{{ $keyword }}"
                                                                                        {{ in_array($keyword, old('permissions')) ? 'checked' : '' }}>
                                                                                <label class="custom-control-label"
                                                                                    style=""
                                                                                    for="{{ $keyword }}">{{ __($k) }}</label>
                                                                            @else
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input read common-key"
                                                                                    id="{{ $keyword }}"
                                                                                    name="permissions[]"
                                                                                    value="{{ $keyword }}"
                                                                                        {{ @$user->permissions ? (in_array($keyword, @$user->permissions) ? 'checked' : '') : '' }}>
                                                                                <label class="custom-control-label"
                                                                                    style=""
                                                                                    for="{{ $keyword }}">{{ __($k) }}</label>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                            {{ $button_name }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ static_asset('admin/js/countries.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click',"#show_hide_password a", function(event) {
                event.preventDefault();
                let selector = $('#show_hide_password input');
                let type = selector.attr("type");
                if(type == "text"){
                    $(selector).attr('type', "password");
                    $('#show_hide_password i').addClass( "mdi-eye-off" ).removeClass( "mdi-eye" );
                }else if(type == "password"){
                    $(selector).attr('type', 'text');
                    $('#show_hide_password i').removeClass( "mdi-eye-off" ).addClass( "mdi-eye" );
                }
            });
            $(document).on('click',"#show_hide_confirm_password a", function(event) {
                event.preventDefault();
                let selector = $('#show_hide_confirm_password input');
                let type = selector.attr("type");
                if(type == "text"){
                    selector.attr('type', 'password');
                    $('#show_hide_confirm_password i').addClass( "mdi-eye-off" ).removeClass( "mdi-eye" );
                }else if(type == "password"){
                    selector.attr('type', 'text');
                    $('#show_hide_confirm_password i').removeClass( "mdi-eye-off" ).addClass( "mdi-eye" );
                }
            });
            if($('#role').val()){
                getRole($('#role').val());
            }
            $('#role').on('change', function(event){
                getRole($(this).val());
            });
            function getRole(_id){
                var token = "{{ csrf_token() }}";
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: '{{ route('role.get.ajax') }}',
                    data: {
                        id: _id,
                        _token: token
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        for(var permission of response.permissions){
                            $('#' + permission).prop('checked', true);
                        }
                    },
                });
            }
        });
    </script>
@endpush