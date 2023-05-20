@extends('admin.partials.master')
@section('affiliate_program_active')
    active
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/summernote-bs4.css') }}" />
@endsection
@section('affiliate')
    active
@endsection
@section('title')
    {{ __('Affiliate Program') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('Affiliate') }}</h2>
            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card email-card">
                        <div class="card-header">
                            <h4>{{ __('Affiliate Program') }}</h4>
                        </div>
                        <div class="card-body col-md-10 middle">
                            <form class="" id="lang">
                                <div class="form-group">
                                    <label for="name">{{ __('Language') }}</label>
                                    <select class="form-control selectric lang" name="lang">
                                        <option value="">{{ __('Select Language') }}</option>
                                        @foreach($languages as $language)
                                            <option value="{{ $language->locale }}" {{($lang !="" ? ($language->locale == $lang ? 'selected' : '') : ($language->locale == 'en' ? 'selected' : '')) }}>{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <form method="post" action="{{route('affiliate.program.update')}}">
                                @csrf @method('put')
                                <div class="form">
                                    <div class="form-group">
                                        <label for="">{{ __('Terms and Conditions') }}</label>
                                        <div class="">
                                            <textarea class="summernote-simple" name="affiliate_terms_condition">{{ old('affiliate_terms_condition') ? old('affiliate_terms_condition') : settingHelper('affiliate_terms_condition', $lang) }}</textarea>
                                            <input type="hidden" value="{{ $lang }}" name="site_lang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">{{ __('Banner') }} {{__('(1600x100)')}}</label>
                                        <div class="form-group">
                                            <div class="input-group gallery-modal" id="btnSubmit"  data-for="image" data-selection="single"
                                                 data-target="#galleryModal" data-dismiss="modal">
                                                <input type="hidden" name="affiliate_program_banner" value="{{ settingHelper('affiliate_program_banner') && settingHelper('affiliate_program_banner')['id'] }}" class="image-selected">
                                                <span class="form-control"><span class="counter">{{ settingHelper('affiliate_program_banner') && settingHelper('affiliate_program_banner')['id'] ? 1 : 0 }}</span> {{ __('file chosen') }}</span>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        {{ __('Choose File') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="selected-media-box">
                                                <div class="mt-4 gallery gallery-md d-flex">
                                                    <div class="selected-media mt-0 m-2" data-id="{{ settingHelper('affiliate_program_banner') && settingHelper('affiliate_program_banner')['id'] }}">
                                                        @if (settingHelper('affiliate_program_banner') && settingHelper('affiliate_program_banner')['images'] != [] && @is_file_exists(@settingHelper('affiliate_program_banner')['images']['image_72x72'], @settingHelper('affiliate_program_banner')['images']['storage']))
                                                            <img src="{{ @get_media(settingHelper('affiliate_program_banner')['images']['image_72x72'], @settingHelper('top_bar_banner')['images']['storage']) }}" alt=""
                                                                 class="img-thumbnail logo-profile">
                                                        @else
                                                            <img src="{{ static_asset('images/default/default-image-72x72.png') }}" alt=""
                                                                 class="img-thumbnail logo-profile">
                                                        @endif
                                                        @if(settingHelper('affiliate_program_banner') && settingHelper('affiliate_program_banner')['id'] != null)
                                                            <div class="image-remove">
                                                                <a href="javascript:void(0)" class="remove"><i class="bx bx-x"></i></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-md-right">
                                        <button class="btn btn-outline-primary" id="save-btn">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.common.selector-modal')
@endsection
@push('page-script')
    <script src="{{ static_asset('admin/js/summernote-bs4.js') }}"></script>
@endpush
@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush