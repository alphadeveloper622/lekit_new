@extends('admin.partials.master')
@section('footer_content')
    active
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/summernote-bs4.css') }}">
@endsection
@section('link')
    active
@endsection
@section('title')
    {{ __('Link') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                @include('admin.store-front.footer-content-sidebar')
                <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="about" role="tabpane1"aria-labelledby="about-tab">
                            <div class="card">
                                <div class="card-header">
                                    {{__(' Link Widget')}}
                                </div>
                                <div class="w-100 p-4">
                                    <form id="lang">
                                        <div class="form-group">
                                            <label for="name">{{ __('Language') }}</label>
                                            <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" name="r">

                                            <select class="form-control selectric lang" name="lang">
                                                <option value="">{{ __('Select Language') }}</option>
                                                @foreach($languages as $language)
                                                    <option value="{{ $language->locale }}" {{ $language->locale == $lang ? 'selected' : '' }}>{{ $language->name }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('lang'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('lang') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <form action="{{ route('footer.menu.update') }}" method = "POST" id="url-short" data-url="{{ route('footer.menu.update') }}">
                                    @csrf
                                    <div class="card-body p-0  mb-4">
                                        <div class="form-inline">
                                            <div class="alert-body w-100 p-4">
                                                <div class="alert alert-light alert-has-icon p-0 mb-0">
                                                    <div class="alert-icon pl-2"><i class="bx bx-bulb"></i></div>
                                                    <small id="passwordHelpBlock" class="form-text">
                                                        {{__('If you want to use others web link like (https://www.google.com/maps,https:/, www.facebook.com/profile) then insert link, otherwise insert just slug ("blogs,products,brands")')}}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="drag-brop-menu" id="drag-brop-menu">
                                            @if( $menu_language && @count(settingHelper('footer_menu')) != 0 && settingHelper('footer_menu') != [])
                                                    @foreach($menu_language as $key => $value)
                                                        <div class="menu-item" data-id="{{ $key+1 }}">
                                                            <input type="hidden" name="lang" id="lang" value="{{$lang}}">
                                                            <a href="#"><i class="bx bx-menu move"></i> </a>
                                                            <label class="sr-only" for="label">{{__('Label')}}</label>
                                                            <input type="text" class="form-control mb-2 mr-sm-2 label-input" name="label[]" value="{{ $value['label'] }}" id="label" placeholder="{{__('Label')}}">

                                                            <label class="sr-only" for="link">{{__('Useful Links')}}</label>
                                                            <input type="text" class="form-control mb-2 mr-sm-2 url-input" id="link" name="url[]" value="{{ $value['url'] }}" placeholder="{{__('Link/Slug')}}">
                                                            <button type="button" onclick="$(this).parent().remove()" class="btn btn-outline-danger btn-circle mb-2 remove-menu-row"><i class="bx bx-trash"></i></button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="menu-item" data-id="1">
                                                        <input type="hidden" name="lang" id="lang" value="{{$lang}}">
                                                        <a href="#"><i class="bx bx-menu move"></i> </a>
                                                        <label class="sr-only" for="label">{{__('Label')}}</label>
                                                        <input type="text" class="form-control mb-2 mr-sm-2 label-input" name="label[]" id="label" placeholder="{{__('Label')}}">


                                                        <label class="sr-only" for="link">{{__('Useful Links')}}</label>
                                                        <input type="text" class="form-control mb-2 mr-sm-2 url-input" id="link" name="url[]" placeholder="{{__('Link/Slug')}}">
                                                        <button type="button" onclick="$(this).parent().remove()" class="btn btn-outline-danger btn-circle mb-2 remove-menu-row"><i class="bx bx-trash"></i></button>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <a href="#" id="add-menu-item" class="btn btn-outline-primary ml-2">{{ __('Add More') }}</a>
                                            </div>
                                            <div class="col-md-6 float-right">
                                                <button type="submit" class="btn btn-outline-primary float-right menu-update-btn">{{ __('Update') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.store-front.content-append')
@endsection
@push('page-script')
    <script src="{{ static_asset('admin/js/sortable.js') }}"></script>
    <script src="{{ static_asset('admin/js/jquery-sortable.js') }}"></script>
    <script src="{{ static_asset('admin/js/ajax-sortable-menu.js') }}"></script>
@endpush

