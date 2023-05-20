@extends('admin.partials.master')
@section('affiliate')
    active
@endsection
@section('affiliate_configure_active')
    active
@endsection
@section('title')
    {{ __('Affiliate Configuration') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{__('All Affiliate Products')}}</h2>
                    <div class="alert alert-light alert-has-icon p-0 mb-2">
                        <div class="alert-icon pl-2"><i class="bx bx-bulb"></i></div>
                        <small id="passwordHelpBlock" class="form-text">
                            {{__('N:B: You can not enable Single Product Sharing Affiliate, Category and Seller Wise Affiliate at a time')}}
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="{{ hasPermission('reward_setting_create') ? 'col-sm-xs-12 col-md-8' : 'col-sm-xs-12 col-md-9 middle' }}">
                    <div class="card">
                        <form action="">
                            <div class="card-header input-title">
                                <h4>{{__('Product Sharing Affiliate (Category wise)')}}</h4>
                                <label class="custom-switch mt-2">
                                    <h4>{{__('Active')}}</h4>
                                    <input type="checkbox" name="custom-switch-checkbox" value="category-affiliate-status-change"
                                           {{@$Affiliate_Options->type == 'category-affiliate-status-change' && $Affiliate_Options->status == 1 ? 'checked' : ''}} class="custom-switch-input status-change">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </form>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>{{__('#')}}</th>
                                        <th>{{__('Category Name')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Type')}}</th>
                                    </tr>

                                    @foreach($categories as $key => $category)
                                    <tr id="" class="table-data-row">
                                        <td>{{$categories->firstItem() + $key }}</td>
                                        <td>
                                            {{ $category->getTranslation('title', \App::getLocale()) }}
                                        </td>
                                        @if($category->affiliate_amount_type == 'percentage')
                                            <td>{{$category->affiliate_amount}}</td>
                                        @else
                                            <td>{{get_price($category->affiliate_amount,user_curr())}}</td>
                                        @endif
                                        <td>{{$category->affiliate_amount_type}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $categories->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <form action="">
                            <div class="card-header input-title">
                                <h4>{{__('Product Sharing Affiliate (Seller wise)')}}</h4>
                                <label class="custom-switch mt-2">
                                    <h4>{{__('Active')}}</h4>
                                    <input type="checkbox" name="custom-switch-checkbox" value="seller-affiliate-status-change"
                                           {{@$Affiliate_Options->type == 'seller-affiliate-status-change' && $Affiliate_Options->status == 1 ? 'checked' : ''}} class="custom-switch-input status-change">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </form>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>{{__('#')}}</th>
                                        <th>{{__('Seller Name')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Type')}}</th>
                                    </tr>

                                    @foreach($sellers as $key => $seller)
                                        <tr id="" class="table-data-row">
                                            <td>{{$sellers->firstItem() + $key }}</td>
                                            <td>
                                                {{ $seller->shop_name }}
                                            </td>
                                            @if($seller->affiliate_amount_type == 'percentage')
                                                <td>{{$seller->affiliate_amount}}</td>
                                            @else
                                                <td>{{get_price($seller->affiliate_amount,user_curr())}}</td>
                                            @endif
                                            <td>{{$seller->affiliate_amount_type}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $sellers->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <form action="">
                            <div class="card-header input-title">
                                <h4>{{__('_Products')}}</h4>
                                <label class="custom-switch mt-2">
                                    <h4>{{__('Active')}}</h4>
                                    <input type="checkbox" name="custom-switch-checkbox" value="product-affiliate-status-change"
                                           {{@$Affiliate_Options->type == 'product-affiliate-status-change' && $Affiliate_Options->status == 1 ? 'checked' : ''}} class="custom-switch-input status-change">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </form>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                    <tr>
                                        <th>{{__('#')}}</th>
                                        <th>{{__('Product Name')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Type')}}</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                        <tr id="" class="table-data-row">
                                            <td>{{$products->firstItem() + $key }}</td>
                                            <td>
                                                <a href="{{ isAppMode() ? '#' : route('product-details',$product->slug) }}">{{ $product->getTranslation('name', \App::getLocale()) }}</a>
                                            </td>
                                            @if($product->affiliate_amount_type == 'percentage')
                                                <td>{{$product->affiliate_amount}}</td>
                                            @else
                                                <td>{{get_price($product->affiliate_amount,user_curr())}}</td>
                                            @endif
                                            <td>{{$product->affiliate_amount_type}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav class="d-inline-block">
                                {{ $products->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
{{--            @if(hasPermission('reward_setting_create'))--}}
                <div class="col-sm-xs-12 col-md-4">
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{__('Product Sharing Affiliate By Category')}}</h4>
                        </div>
                        <div class="card-body card-body-paddding">
                            <form method="POST" action="{{route('configure.affiliate.by')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="category">{{ __('Category') }}</label>
                                    <select class="filter-categories-by-ajax form-control select2" name="c" id="c" required>
                                        <option value="">{{ __('Category') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="affiliate_amount">{{__('Amount')}}</label>
                                    <input type="number" class="form-control" name="affiliate_amount" id="affiliate_amount" required
                                        value="{{old('affiliate_amount')}}"
                                        placeholder="{{__('Amount')}}" tabindex="1"
                                        required>
                                    <input type="hidden" name="type" value="category">
                                    @if ($errors->has('affiliate_amount'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('reward') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="affiliate_amount_type">{{ __('Type') }}</label>
                                    <select class="form-control selectric" name="affiliate_amount_type"
                                            id="affiliate_amount_type">
                                        <option value="" selected>{{ __('Select Type') }}</option>
                                        <option
                                                value="flat">{{ __('Flat') }}</option>
                                        <option
                                                value="percentage">{{ __('Percentage') }}</option>
                                    </select>
                                </div>

{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="sub_category" name="sub_category">--}}
{{--                                    <label class="custom-control-label" for="sub_category">{{ __('Apply for sub category also ?') }}</label>--}}
{{--                                </div>--}}

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{__('Product Sharing Affiliate By Seller')}}</h4>
                        </div>
                        <div class="card-body card-body-paddding">
                            <form method="POST" action="{{route('configure.affiliate.by')}}">
                                @csrf
                                <div class="form-group">
                                    <select class="seller-by-ajax form-control select2 sorting" name="seller_id" id="seller_id" required>
                                        <option value="">{{ __('Select Seller') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="reward">{{__('Amount')}}</label>
                                    <input type="number" class="form-control" name="affiliate_amount" id="affiliate_amount"
                                        value="{{old('affiliate_amount')}}"
                                        placeholder="{{__('Amount')}}" tabindex="1"
                                        required>
                                    <input type="hidden" name="type" value="seller">
                                @if ($errors->has('affiliate_amount'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('affiliate_amount') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="affiliate_amount_type">{{ __('Type') }}</label>
                                    <select class="form-control selectric" name="affiliate_amount_type"
                                            id="affiliate_amount_type">
                                        <option value="" selected>{{ __('Select Type') }}</option>
                                        <option
                                                value="flat">{{ __('Flat') }}</option>
                                        <option
                                                value="percentage">{{ __('Percentage') }}</option>
                                    </select>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{__('Products')}}</h4>
                        </div>
                        <div class="card-body card-body-paddding">
                            <form method="POST" action="{{route('configure.affiliate.by')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="product_id">{{ __('Product') }}</label>

                                    <select class="product-by-ajax form-control select2" id ="product_id" multiple="multiple" name="product_id[]" aria-hidden="true" required></select>
                                    @if ($errors->has('product_id'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('product_id') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="reward">{{__('Reward')}}</label>
                                    <input type="number" class="form-control" name="affiliate_amount" id="affiliate_amount"
                                        value="{{old('affiliate_amount')}}"
                                        placeholder="{{__('Amount')}}" tabindex="1"
                                        required>
                                    <input type="hidden" name="type" value="product">
                                @if ($errors->has('affiliate_amount'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('affiliate_amount') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="affiliate_amount_type">{{ __('Type') }}</label>
                                    <select class="form-control selectric" name="affiliate_amount_type"
                                            id="affiliate_amount_type">
                                        <option value="" selected>{{ __('Select Type') }}</option>
                                        <option
                                                value="flat">{{ __('Flat') }}</option>
                                        <option
                                                value="percentage">{{ __('Percentage') }}</option>
                                    </select>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--            @endif--}}
            </div>
        </div>
    </section>
    @include('admin.common.selector-modal')
    @include('admin.common.common-modal')
@endsection
@push('script')
    <script type="text/javascript" src="{{static_asset('admin/js/ajax-div-load.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('admin/js/ajax-live-search.js') }}"></script>
@endpush

