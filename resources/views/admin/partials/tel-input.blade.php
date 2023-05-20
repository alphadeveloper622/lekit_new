@php
    $countries = \App\Models\Country::with('flag')->where('status', 1)->orderBy('name')->get();
    $default_country = count($countries) > 0 ? $countries->where('id', $country_id)->first() : null;
@endphp
<label>{{ $label }}</label>
<div class="yoori__signup--form">
    <div class="country__code--config">
        @if($default_country)
            <div class="country__code--config-details">
                    <span class="country__code--flag">
                        <img src="{{ $country_id == 232 ? static_asset('images/flags/gb1.png') : $default_country->flag_icon }}" alt="Flag" class="img-fluid">
                    </span>
                <span class="country__code--number">
                        {{ str_contains($default_country->phonecode,'+') ? $default_country->phonecode : '+'.$default_country->phonecode }}
                    </span>
                <span class="country__dropdown"></span>
            </div>
        @else
            <div class="country__code--config-details">
                    <span class="country__code--flag">
                        <img src="{{ static_asset('images/flags/gb1.png') }}" alt="Flag" class="img-fluid">
                    </span>
                <span class="country__code--number">
                        +44
                    </span>
                <span class="country__dropdown"></span>
            </div>
        @endif
    </div>
    <ul class="country__code--list d-none">
        <input placeholder="Search" type="text" class="country__search">
        @foreach($countries as $country)
            <li class="country_li" data-id="{{ $country->id }}" data-flag="{{ $country->flag_icon }}" data-country_code="{{ str_contains($country->phonecode,'+') ? $country->phonecode : '+'.$country->phonecode }}">
                <span class="country__code--flag">
                    @if($country->flag)
                        <img src="{{ $country->flag_icon }}"
                             alt=""
                             class="img-fluid">
                    @else
                        <img src="{{ static_asset('images/default/default-image-40x40.png') }}"
                             alt="default_image" width="16" height="11"
                             class="img-fluid">
                    @endif
                </span>
                <span class="country__name">
                            <strong><span class="country_name_span">{{ $country->name }}</span> <span class="country__code--number">{{ str_contains($country->phonecode,'+') ? $country->phonecode : '+'.$country->phonecode }}</span></strong></span>
                <span class="country__code--number"></span>
            </li>
        @endforeach
    </ul>
    <input type="hidden" name="countries" value="{{ $countries }}">
    <input type="tel" class="number" name="{{ $name }}" value="{{ $value }}">
    <input type="hidden" name="{{ $country_id_field }}" class="country_id" value="{{ $country_id }}">
</div>
@if ($errors->has($name))
    <div class="invalid-feedback">
        <p>{{ $errors->first($name) }}</p>
    </div>
@endif