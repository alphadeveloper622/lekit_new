@extends('admin.partials.master')

@section('title')
    {{ __('Media Library') }}
@endsection
@section('media')
    active
@endsection
@php

    $s              = isset($_GET['s']) ? $_GET['s'] : null;
    $q              = isset($_GET['q']) ? $_GET['q'] : null;
@endphp
@section('main-content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Media Library') }}</h2>
                    <p class="section-lead">
                    {{ __('You have total') . ' ' . $medias->total(). ' ' . __('Medias') }}
                </div>
                @if (hasPermission('media_create'))
                    <div class="text-right d-flex">
                        @if(!isDemoServer())
                            <div class="buttons add-button">
                                <a href="{{ route('admin.add.media') }}"
                                   class="btn btn-icon icon-left btn-outline-primary">
                                    <i class="bx bx-plus"></i>{{ __('Upload File') }}</a>
                            </div>
                        @endif
                        <div class="buttons add-button setting">
                            <a href="{{ route('storage.setting') }}" class="btn btn-icon icon-left btn-outline-primary"
                               data-toggle="tooltip" data-original-title="{{ __('Storage Configuration') }}">
                                <i class="bx bx-cog"></i></a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Media') }}</h4>
                            <div class="card-header-form media">
                                <form class="form-inline" id="sorting">
                                    <div class="form-group">
                                        <select class="form-control selectric sorting" name="s">
                                            <option {{ @$s == "" ? "selected" : "" }} value="">{{ __('Sort by') }}</option>
                                            <option {{ @$s == "latest_top" ? "selected" : "" }} value="latest_top">{{ __('Latest On Top') }}</option>
                                            <option {{ @$s == "oldest_top" ? "selected" : "" }} value="oldest_top">{{ __('Oldest On Top') }}</option>
                                            <option {{ @$s == "smallest_top" ? "selected" : "" }} value="smallest_top">{{ __('Smallest On Top') }}</option>
                                            <option {{ @$s == "largest_top" ? "selected" : "" }} value="largest_top">{{ __('Largest On Top') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="q" value="{{ @$q }}" class="form-control"
                                                   placeholder="{{ __('Search') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-outline-primary"><i class='bx bx-search'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body sg-media-gallery mt-3">
                            @foreach($medias as $media)
                                <article class="article article-style-b library" id="artilce_{{ $media->id }}">
                                    <div class="d-flex">
                                        <div>
                                            <div class="article-header">
                                                <label class="imagecheck mb-4">
                                                    <figure class="imagecheck-figure">
                                                        @if($media->type == 'image' && @is_file_exists($media->image_variants['image_190x230'] , $media->storage))
                                                            <img src="{{ get_media($media->image_variants['image_190x230'], $media->storage) }}"
                                                                 alt="{{ $media->name }}"
                                                                 class="imagecheck-image article-image">
                                                        @else
                                                            <img src="{{ static_asset('images/default/default-'.$media->type.'-190x230.png') }}"
                                                                 alt="{{ $media->name }}"
                                                                 class="imagecheck-image article-image">
                                                        @endif
                                                    </figure>
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="media__content">
                                                <span class="article-title image-size oneline title-text">{{ $media->name }}</span>
                                                <div class="article-details">
                                                    <span class="image-size d-block my-1">{{ formatBytes($media->size) }} | <span
                                                                class="uppercase">{{ $media->extension }}</span></span>
                                                    <span class="image-size">{{__('At').': '. date('M d, Y g:i A', strtotime($media->created_at)) }}</span>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="article-title image-size oneline">{{ __('By') }}: {{ @$media->user->first_name.' '.@$media->user->last_name }}</span>
                                                    <span class="img-ext image-size">({{ @$media->user->user_type}})</span>
                                                </div>
                                                <div class="center bottom-fixing">
                                                    <div class="d-flex center">
                                                        @if (hasPermission('media_delete') || Sentinel::getUser()->user_type == 'seller')
                                                            <a href="javascript:void(0)"
                                                               onclick="delete_media('delete/media/', {{ $media->id }})"
                                                               class="dropdown-item btn btn-outline-danger btn-circle">
                                                                <i class='bx bx-trash'></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)"
                                                           data-text="{{ __('Copied to Clipboard') }}"
                                                           data-url="{{ get_media($media->original_file, $media->storage) }}"
                                                           class="dropdown-item {{ (hasPermission('media_delete') || Sentinel::getUser()->user_type == 'seller') ? 'ml-2' : '' }} copy-to-clipboard btn btn-outline-info btn-circle">
                                                            <i class='bx bx-copy'></i>
                                                        </a>
                                                    </div>
                                                    <div class="center mt-1">
                                                        <a href="{{ get_media($media->original_file, $media->storage) }}"
                                                           target="_blank"
                                                           download="{{ $media->name }}.{{ $media->extension }}"
                                                           class="dropdown-item btn btn-outline-success btn-circle">
                                                            <i class='bx bx-download'></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $medias->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content End -->
@endsection
@include('admin.common.delete-ajax')
