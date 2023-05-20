@extends('admin.partials.master')
@section('ai_writer')
    active
@endsection
@section('ai_writer')
    active
@endsection
@section('title')
    {{ __('ai_writer') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('ai_writer') }}</h2>
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('ai_writer_setting') }}</h4>
                        </div>
                        <div class="card-body col-md-10 middle">
                            <form action="{{ route('chat.messenger.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label class="d-flex justify-content-between"
                                           for="secret_key">{{ __('secret_key') }} <span>{{ __('get_api_key') }} <a
                                                    href="https://platform.openai.com/account/api-keys"
                                                    target="_blank">{{ __('click_here') }}</a></span></label>
                                    <input type="text" class="form-control" name="ai_secret_key" id="ai_secret_key"
                                           value="{{ old('ai_secret_key') ? old('ai_secret_key') : settingHelper('ai_secret_key') }}"
                                           placeholder="{{ __('ai_secret_key') }}" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ai_secret_key') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ai_review_option">{{ __('ai_review_option') }}</label>
                                    <select class="form-control selectric" name="ai_review_option"
                                            id="ai_review_option">
                                        <option value="0" {{ settingHelper('ai_review_option') == 0 ? 'selected' : '' }}>{{ __('disabled') }}</option>
                                        <option value="1" {{ settingHelper('ai_review_option') == 1 ? 'selected' : '' }}>{{ __('use_ai_automated_reply') }}</option>
                                        <option value="2" {{ settingHelper('ai_review_option') == 2 ? 'selected' : '' }}>{{ __('depend_on_seller') }}</option>
                                    </select>
                                </div>
                                <div class="text-md-right">
                                    <button class="btn btn-outline-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header input-title">
                                    <h4>{{ __('ai_writer_review_option_into') }}</h4>
                                </div>
                                <div class="card-body card-body-paddding">
                                    <div class="contents mt-2">
                                        {{ __('type_setting') }}:
                                        <ul class="text-justify">
                                            <li>
                                                1. <strong>{{ __('disabled') }}</strong>
                                                : {{ __('disabled_ai_writer') }}
                                            </li>
                                            <li>2. <strong>{{ __('use_ai_automated_reply') }}</strong>
                                                : {{ __('use_ai_automated_reply_help_text') }}</li>
                                            <li>3. <strong>{{ __('depend_on_seller') }}</strong>
                                                : {{ __('depend_on_seller_help_text') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('ai_writer') }}</h4>
                        </div>
                        <div class="card-body col-md-10 middle">
                            <form action="{{ route('chat.messenger.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="use_case">{{ __('ai_review_option') }}*</label>
                                    <select class="form-control selectric" name="use_case"
                                            id="use_case">
                                        @foreach($use_cases as $key => $use_case)
                                            <option value="{{ $key }}">{{ $use_case }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="primary_keyword">{{ __('primary_keyword') }}*</label>
                                    <input type="text" class="form-control" name="primary_keyword" id="primary_keyword"
                                           placeholder="{{ __('how_to_make_money_from_youtube') }}">
                                </div>
                                <div class="form-group">
                                    <label for="variants">{{ __('No of Variants') }}*</label>
                                    <select class="form-control selectric" name="variants"
                                            id="variants">
                                        @for($i = 1; $i <= 3; $i++)
                                            <option value="{{ $i }}">{{ $i.' '.__('variants') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="text-md-right">
                                    <button class="btn btn-outline-primary generate_content_for_me" data-url="{{ route('ai.content') }}">{{ __('write_for_me') }}</button>
                                    <button class="btn btn-primary disable_btn d-none btn_loader" tabindex="4" id="preloader">
                                        <i class="bx bx-loader bx-spin"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ __('ai_writer_content') }}</h4>
                                </div>
                                <div class="card-body middle">
                                    <div class="form-group">
                                        <label for="description"
                                               class="form-control-label">{{ __('content') }}</label>
                                        <div>
                                        <textarea type="text" class="summernote ai_description" name="description"
                                                  id="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('page-script')
    <script src="{{ static_asset('admin/js/summernote-bs4.js') }}"></script>
    <script src="{{ static_asset('admin/js/ai_writer.js') }}"></script>
@endpush
@section('page-style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/summernote-bs4.css') }}">
@endsection