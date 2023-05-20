@extends('admin.partials.master')
@section('page-style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/summernote-bs4.css') }}">
@endsection
@section('title')
    {{ __('Add Ticket') }}
@endsection
@section('tickets')
    active
@endsection
@section('support_active')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('Add Ticket')}}</h2>
                </div>
                <div class="buttons add-button">
                    <a href="{{route('seller.support')}}" class="btn btn-icon icon-left btn-outline-primary"><i class='bx bx-arrow-back'></i>{{__('Back')}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 middle">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{__('Ticket Info')}}</h4>
                        </div>
                        <form  action="{{route('seller.support.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="subject">{{__('Subject')}}</label>
                                    <input type="text" id="subject" name="subject" value="{{old('subject')}}" class="form-control" id="" placeholder="{{__('Subject')}}">
                                    @if ($errors->has('subject'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('subject') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{__('Department')}}</label>
                                    <select name="support_department_id" class="form-control selectric">
                                        <option value="">{{__('Select Department')}}</option>
                                        @foreach($departments as $department)
                                            <option value="{{  $department->id }} {{old('department') ==  $department->getTranslation('title', \App::getLocale()) ? 'selected' : ''}}">{{  $department->getTranslation('title', \App::getLocale()) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('department') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">{{__('Priority')}}</label>
                                    <select name="priority" class="form-control selectric">
                                        <option value="">{{__('Select Priority ')}}</option>
                                        <option value="low" {{old('priority') == 'low' ? 'selected' : ''}}>Low </option>
                                        <option value="medium" {{old('priority') == 'medium' ? 'selected' : ''}}>Medium</option>
                                        <option value="high"  {{old('priority') == 'high' ? 'selected' : ''}}>High</option>
                                    </select>
                                    @if ($errors->has('priority'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('priority') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">

                            </div>
                            @php
                                $id = Sentinel::getUser()->id;
                            @endphp
                            <div class="form-group">
                                <label for="ticket_body">{{__('Ticket Body')}}</label>
                                <div class="form-group row mb-12">
                                    <div class="col-sm-12 col-md-12">
                                        <textarea id="ticket_body" value="{{old('ticket_body')}}" name="ticket_body" class="summernote"></textarea>
                                        <input type="hidden" name="user_id" value="{{$id}}"/>
                                        <input type="hidden" name="status" value="pending"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="logo">{{ __('File') }}</label>
                                <div class="form-group">
                                    <div class="input-group gallery-modal" id="btnSubmit"  data-for="all" data-selection="multiple"
                                         data-target="#galleryModal" data-dismiss="modal">
                                        <input type="hidden" name="file" value=""  class="image-selected">
                                        <span class="form-control"><span class="counter">0</span> {{ __('file chosen') }}</span>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                {{ __('Choose File') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="selected-media-box">
                                        <div class="mt-4 gallery gallery-md d-flex">
                                            <img src="{{ static_asset('images/default/default-image-72x72.png') }}" data-default="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                 alt="brand-logo" class="img-thumbnail logo-profile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-outline-primary">{{__('Save')}}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.common.selector-modal')
@endsection
@include('seller.support.customer-by-ajax')
@push('page-script')
    <script src="{{ static_asset('admin/js/summernote-bs4.js') }}"></script>
@endpush

@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush
