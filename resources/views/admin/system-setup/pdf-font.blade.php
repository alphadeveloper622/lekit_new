@extends('admin.partials.master')
@section('setup')
    active
@endsection
@section('pdf_font')
    active
@endsection
@section('title')
    {{ __('Pdf Font') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('Settings') }}</h2>
            <div id="output-status"></div>
            <div class="row">
                @include('admin.system-setup.sidebar')
                <div class="col-md-9">
                    <div class="card email-card">
                        <div class="card-header">
                            <h4>{{ __('Pdf Font') }}</h4>
                        </div>
                        <div class="col-md-10 middle card-body card-body-paddding">
                            <div class="form-group">
                                <label class="custom-switch mt-2 {{ hasPermission('font_update') ? '' : 'cursor-not-allowed' }}">
                                    <input type="checkbox" name="custom-switch-checkbox" value="font-status-change/{{@$font->id}}"
                                           {{ @$font->status == 1 ? 'checked' : '' }} {{  hasPermission('font_update') ? '' : 'disabled' }} class="{{  hasPermission('font_update') ? 'status-change' : '' }} custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">{{ __('Activate') }}</span>

                                </label>
                            </div>
                            <form action="{{ route('admin.update.font') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('Language Name') }} *</label>
                                    <input type="hidden" value="{{@$font->id}}" name="id" />
                                    <input type="text" name="title" id="title" value="{{ old('title') ?old('title') : @$font->title }}" placeholder="{{__('Title')}}" class="form-control" required>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('title') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Locale') }} *</label>
                                    <select name="local" class="form-control select2">
                                        <option value="">{{ __('Select Locale') }}</option>
                                        @foreach (get_yrsetting('locale') as $locale)
                                            <option value="{{ $locale }}" {{ @$font->local == $locale ? 'selected' : '' }}>{{ $locale }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('local'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('local') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="file">{{ __('Regular Font') }} <small>{{ __('(ttf File)') }}</small> *</label>
                                    <div class="form-group">
                                        <input type="file" class="custom-file-input image_pick file-select"
                                               accept=".ttf" name="regular_ttf_file" id="customFile"/>
                                        @if ($errors->has('regular_ttf_file'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('regular_ttf_file') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">{{ __('Medium Font') }} <small>{{ __('(ttf File)') }}</small></label>
                                    <div class="form-group">
                                        <input type="file" class="custom-file-input image_pick file-select"
                                               accept=".ttf" name="medium_ttf_file" id="customFile"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">{{ __('Bold Font') }} <small>{{ __('(ttf File)') }}</small></label>
                                    <div class="form-group">
                                        <input type="file" class="custom-file-input image_pick file-select"
                                               accept=".ttf" name="bold_ttf_file" id="customFile"/>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
