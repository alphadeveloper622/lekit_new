@extends('admin.partials.master')

@php
$route = isset($user) ? route('customer.update') : route('customer.store');
$title = isset($user) ? __('Edit') : __('Add');
$button_name = isset($user) ? __('Update') : __('Add');
@endphp

@section('title')
    {{ $title }} {{ __('Customer') }}
@endsection
@section('customers')
    active
@endsection

@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ $title }} {{ __('Customer') }}</h2>
                </div>
                <div class="buttons add-button">
                    <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" class="btn btn-icon icon-left btn-outline-primary"><i
                            class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8 middle">
                <div class="card">
                    <form action="{{ $route }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body card-body-paddding phone-block">
                                    <div class="form-group">
                                        <label for="first_name"> {{ __('First Name') }} </label>
                                        <input type="hidden" value="{{ @$user->id }}" name="id">
                                        <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" name="r">
                                        <input type="text" name="first_name" id="first_name" placeholder="{{__('First Name')}}"
                                               value="{{ old('first_name') ? old('first_name') : @$user->first_name }}"
                                               class="form-control">
                                        @if ($errors->has('first_name'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('first_name') }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">{{ __('Last Name') }} </label>
                                        <input type="text" id="last_name" name="last_name"
                                               value="{{ old('last_name') ? old('last_name') : @$user->last_name }}" placeholder="{{ __('Last Name') }}"
                                               class="form-control">
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
                                        <label for="email">{{ __('Email') }} </label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="{{ __('Email')}}"
                                               value="{{ old('email') ? old('email') : (isDemoServer() && isset($user->email) ? emailAddressMask($user->email) : @$user->email) }}">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('email') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }} </label>
                                        <div class="input-group sohide_ico_pos" id="show_hide_password">
                                            <input type="password" name="password" class="form-control" placeholder="{{ __('Password')}}">
                                            <div class="input-group-addon">
                                                <a href=""><i class='mdi mdi-eye-off'></i></a>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback"> <i class="bi bi-eye-slash" id="togglePassword"></i>
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
                                    <div class="form-group mt-4 text-center">
                                        @if (@$user->images != [] && @is_file_exists(@$user->images['image_128x128']))
                                            <img src="{{ get_media($user->images['image_128x128']) }}"
                                                 alt="{{ @$user->first_name }}" id="img_profile"
                                                 class="img-thumbnail user-profile ">
                                        @else
                                            <img src="{{ static_asset('images/default/user.jpg') }}"
                                                 alt="{{ @$user->first_name }}" id="img_profile"
                                                 class="img-thumbnail user-profile">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('Profile Image') }}</label>
                                        <div class="form-group">
                                                <input type="file" class="custom-file-input image_pick file-select"  data-image-for="profile" name="image" id="customFile"
                                                value="{{ @$user->image_id }}" accept="image/*" />
                                                @if ($errors->has('image'))
                                                    <div class="invalid-feedback">
                                                        <p>{{ $errors->first('image') }}</p>
                                                    </div>
                                                @endif
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
        });
    </script>
@endpush