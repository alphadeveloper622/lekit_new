@extends('admin.partials.master')

@section('title')
    {{ __('Product Reviews') }}
@endsection
@section('product_active')
    active
@endsection
@section('product_review')
    active
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('Product Reviews')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            @if(addon_is_activated('ai_writer') && settingHelper('ai_review_option') == 2)
                                <table class="table table-md">
                                    <tbody>
                                    <tr>
                                        <td>{{ __('automated_reply_for_review') }}</td>
                                        <td width="300">
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="custom-switch-checkbox"
                                                       value="config-user-review/{{ authId() }}" {{ authUser()->ai_review_option == 1 ? 'checked' : '' }}
                                                       class="custom-switch-input status-change">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>{{__('Reviews List')}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('User')}}</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Review Title')}}</th>
                                        <th>{{ __('review_image') }}</th>
                                        <th>{{__('Rating')}}</th>
                                        <th>{{__('comment')}}</th>
                                    </tr>

                                    @foreach ($reviews as $key => $review)
                                        @php
                                            $product = $review->product;
                                        @endphp
                                        <tr id="row_{{$review->id}}">
                                            <td>{{$reviews->firstItem() + $key}}</td>
                                            <td>
                                                {{$review->user->first_name.' '.$review->user->last_name}}
                                            </td>
                                            <td width="40%">
                                                @if(isAppMode())
                                                    <a href="#">{{ $product->getTranslation('name', \App::getLocale()) }}</a>
                                                @else
                                                    <a href="{{ route('product-details',$product->slug) }}"
                                                       target="_blank">{{ $product->getTranslation('name', \App::getLocale()) }}</a>
                                                @endif</td>
                                            <td>{{ $review->title }}</td>
                                            <td><img src="{{ getFileLink('original_image',$review->images) }}"
                                                     alt="{{ $review->title }}" width="100"></td>
                                            <td>{{ $review->rating}}</td>
                                            <td>{{ $review->comment}}</td>
                                            <td>
                                                <a href="javaScript:void(0)" data-toggle="dropdown"
                                                   class="btn btn-outline-secondary btn-circle" title=""
                                                   data-original-title="{{ __('Options') }}">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route("admin.product.replies",$review->id) }}"
                                                       target="_blank"
                                                       class="dropdown-item has-icon"><i
                                                                class='bx bx-star'></i>{{ __('Replies') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $reviews->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.common.delete-ajax')
