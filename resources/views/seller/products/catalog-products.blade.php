@extends('admin.partials.master')
@section('catalog-product')
    active
@endsection
@section('product_active')
    active
@endsection
@section('title')
    {{ __('Catalog Products') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Catalog Products') }}</h2>
                    <p class="section-lead">
                        {{ __('You have total') . ' ' . $products->total() . ' ' . __('Products') }}
                    </p>
                </div>
                <div class="buttons add-button">
                    <a href="{{ route('seller.catalog.product.create') }}" class="btn btn-icon icon-left btn-outline-primary">
                        <i class='bx bx-plus'></i>{{ __('Add new Catalog Product') }}
                    </a>
                    <button class="btn btn-icon icon-left btn-outline-primary" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-dots-horizontal'></i>
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start"
                         style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="{{ route('seller.digital.product.create') }}"><i
                                class='bx bx-plus'></i> {{__("Add Digital Product")}}</a>
                        <a class="dropdown-item has-icon" href="{{ route('seller.catalog.product.create') }}"><i
                                class='bx bx-plus'></i> {{__("Add Catalog Product")}}</a>
                        <a class="dropdown-item has-icon" href="{{ route('seller.classified.product.create') }}"><i
                                class='bx bx-plus'></i>{{__("Add Classified Product")}}</a>
                        @if(addon_is_activated('wholesale') == true && settingHelper('seller_can_create_wholesale'))
                            <a class="dropdown-item has-icon" href="{{ route('seller.wholesale.product.create') }}"><i
                                    class='bx bx-plus'></i>{{__("Add Wholesale Product")}}</a>
                        @endif
                    </div>
                </div>
            </div>
            @php
                $all            = DB::table('products')->where('is_deleted',0)->where('user_id', Sentinel::getUser()->id)->where('is_catalog',1)->get();
                $total          = $all->count();
                $published      = $all->where('status','published')->where('is_approved', 1)->count();
                $unpublished    = $all->where('status','unpublished')->where('is_approved', 1)->count();
                $pending        = $all->where('is_approved', 0)->count();
                $trash          = $all->where('status','trash')->count();

                $c              = isset($_GET['c']) ? $_GET['c'] : null;
                $sq             = isset($_GET['sq']) ? $_GET['sq'] : null;
                $s              = isset($_GET['s']) ? $_GET['s'] : null;
                $q              = isset($_GET['q']) ? $_GET['q'] : null;
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <form id="my_form" method="get" action="">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link {{ $status === null  ? 'active' : '' }}"
                                           href="{{ route('seller.catalog.products') }}">{{__('All')}} <span
                                                class="badge badge-primary">{{ $total - $trash }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $status === 'published' && $status != 'trash' ? 'active' : '' }}"
                                           href="{{ route('seller.catalog.products','published') }}">{{__('Published')}} <span
                                                class="badge badge-primary">{{ $published }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $status === 'unpublished' && $status != 'trash' ? 'active' : '' }}"
                                           href="{{ route('seller.catalog.products','unpublished') }}">{{__('Unpublished')}}
                                            <span class="badge badge-primary">{{ $unpublished }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $status === 'pending' && $status != 'trash'? 'active' : '' }}"
                                           href="{{ route('seller.catalog.products','pending') }}">{{__('Pending')}} <span
                                                class="badge badge-primary">{{ $pending }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $status === 'trash' ? 'active' : '' }}"
                                           href="{{ route('seller.catalog.products','trash') }}">{{__('Trash')}} <span
                                                class="badge badge-primary">{{ $trash }}</span></a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-xs-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Products') }}</h4>
                            <div class="card-header-form">
                                <form class="form-inline">
                                    <div class="form-group">
                                        @php
                                            $position = '';
                                                if(isset($selected_category)):
                                                    if($selected_category->position == 2):
                                                        $position = '¦--¦--';
                                                    elseif($selected_category->position == 1):
                                                        $position = '¦--';
                                                    else:
                                                        $position = '';
                                                    endif;
                                                endif;
                                        @endphp
                                        <select class="filter-categories-by-ajax form-control select2" name="c" id="c">
                                            <option value="">{{ __('All Category') }}</option>
                                            @if(isset($c))
                                                @if($selected_category != null)
                                                    <option selected value="{{ @$c }}"> {{ $position.@$selected_category->getTranslation('title', App::getLocale()) }} </option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control selectric" name="s">
                                            <option
                                                value="latest_on_top" {{ $s == 'latest_on_top' ? 'selected' : '' }}>{{ __('Latest On Top') }}</option>
                                            <option
                                                value="oldest_on_top" {{ $s == 'oldest_on_top' ? 'selected' : '' }}>{{ __('Oldest On Top') }}</option>
                                            <option
                                                value="sale_high" {{ $s == 'sale_high' ? 'selected' : '' }}>{{ __('Sale(High > Low)') }}</option>
                                            <option
                                                value="sale_low" {{ $s == 'sale_low' ? 'selected' : '' }}>{{ __('Sale(Low > High)') }}</option>
                                            <option
                                                value="rating_high" {{ $s == 'rating_high' ? 'selected' : '' }}>{{ __('Rating(High > Low)') }}</option>
                                            <option
                                                value="rating_low" {{ $s == 'rating_low' ? 'selected' : '' }}>{{ __('Rating(Low > High)') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="q" value="{{ $q }}" class="form-control"
                                                   placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-outline-primary"><i class='bx bx-search'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Detail') }}</th>
                                        <th>{{ __('Current Stock') }}</th>
                                        <th>{{ __('Published') }}</th>
                                        <th>{{ __('Catalog') }}</th>
                                        <th>{{ __("Today's Deal") }}</th>
                                        <th>{{ __('Featured') }}</th>
                                        <th>{{ __('Option') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr id="row_{{$product->id}}">
                                            <td>{{ $key+1 }}</td>
                                            <td width="300">
                                                <div class="d-flex">
                                                    <div class="text-left">
                                                        @if ($product->thumbnail != [] && is_file_exists($product->thumbnail['image_40x40'], $product->thumbnail['storage']))
                                                            <img
                                                                src="{{ get_media($product->thumbnail['image_40x40'], $product->thumbnail['storage']) }}"
                                                                alt="{{ $product->name }}"
                                                                class="mr-3 rounded">
                                                        @else
                                                            <img
                                                                src="{{ static_asset('images/default/default-image-40x40.png') }}"
                                                                alt="{{ $product->name }}"
                                                                class="mr-3 rounded">
                                                        @endif
                                                    </div>
                                                    <div class="ml-1">
                                                        <a href="{{ route('product-details',$product->slug) }}">{{ $product->getTranslation('name', \App::getLocale()) }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ __('Price').': '.get_price($product->price,user_curr()) }} / {{ $product->getTranslation('unit', \App::getLocale()) }}</span><br>
                                                <span>{{ __('Total Sale').': '.$product->total_sale }}</span><br>
                                                <span>{{ __('Rating').': '.$product->rating }}</span><br>
                                            </td>
                                            <td>
                                                @foreach($product->stock as $stock)
                                                    <span>{{ $stock->sku != '' ? $stock->sku.': '.$stock->current_stock : $stock->current_stock }}</span>
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($product->is_approved == 0)
                                                    <div class="d-flex">
                                                        <div
                                                            class="ml-1 badge badge-pill badge-warning">{{ __('Pending') }}</div>
                                                    </div>
                                                @else
                                                    <label class="custom-switch mt-2 {{ $product->status != 'trash' ? '' : 'cursor-not-allowed' }}">
                                                        <input type="checkbox"
                                                               {{ $product->status != 'trash' ? '' : 'disabled' }}
                                                               value="product-status-change/{{$product->id}}/status"
                                                               {{ $product->status == 'published' ? 'checked' : '' }} name="custom-switch-checkbox"
                                                               class="product-status-change custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                @endif
                                            </td>
                                            <td>
                                                <label class="custom-switch mt-2 {{ $product->status != 'trash' ? '' : 'cursor-not-allowed' }}">
                                                    <input type="checkbox"
                                                           {{ $product->status != 'trash' ? '' : 'disabled' }}
                                                           value="product-status-change/{{$product->id}}/is_catalog"
                                                           {{ $product->is_catalog == 1 ? 'checked' : '' }} name="custom-switch-checkbox"
                                                           class="product-status-change custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-switch cursor-not-allowed mt-2">
                                                    <input type="checkbox"
                                                           {{ $product->todays_deal == 1 ? 'checked' : '' }} name="custom-switch-checkbox"
                                                           disabled class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-switch cursor-not-allowed mt-2">
                                                    <input type="checkbox"
                                                           {{ $product->is_featured == 1 ? 'checked' : '' }} name="custom-switch-checkbox"
                                                           disabled class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                @if($product->status != 'trash')
                                                    <a href="{{ $product->is_wholesale ? route('seller.wholesale.product.edit', $product->id) : route('seller.product.edit', $product->id) }}"
                                                       class="btn btn-outline-secondary btn-circle"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="{{ __('Edit') }}"><i
                                                            class="bx bx-edit"></i></a>

                                                    <a href="{{ route('seller.product.clone', $product->id) }}"
                                                       class="btn btn-outline-primary btn-circle"
                                                       data-toggle="tooltip"
                                                       title="" data-original-title="{{__('Clone')}}"><i
                                                            class='bx bx-copy'></i>
                                                    </a>
                                                    <a href="#"
                                                       onclick="delete_row('delete/products/', {{ $product->id }})"
                                                       class="btn btn-outline-danger btn-circle"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="{{__('Delete')}}"><i
                                                            class="bx bx-trash"></i></a>
                                                    <a href="javascript:void(0)" data-toggle="dropdown"
                                                       class="btn btn-outline-secondary btn-circle" title=""
                                                       data-original-title="{{ __('Options') }}">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('product-details',$product->slug) }}" class="dropdown-item has-icon"><i
                                                                class='bx bx-show'></i>{{ __('Show') }}</a>
                                                        <a href="{{ url("seller/product-reviews?product_id=$product->id") }}" target="_blank"
                                                           class="dropdown-item has-icon"><i
                                                                    class='bx bx-star'></i>{{ __('Reviews') }}</a>
                                                        @if(addon_is_activated('wholesale') == true && !$product->is_wholesale && settingHelper('seller_can_create_wholesale'))
                                                            <a href="{{ route('seller.wholesale.product.clone', $product->id) }}"
                                                               class="dropdown-item has-icon"><i
                                                                    class='bx bx-copy'></i>{{ __('Clone As Wholesale') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                @else
                                                    <a href="{{ route('seller.product.restore', $product->id) }}"
                                                       class="btn btn-outline-primary btn-circle"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="{{ __('Restore') }}"><i
                                                            class="bx bx-reset"></i></a>

                                                    <a href="javascript:void(0)"
                                                       onclick="delete_row('delete/products/', {{ $product->id }})"
                                                       class="btn btn-outline-danger btn-circle"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="{{ __('Permanent Delete') }}">
                                                        <i class='bx bx-trash'></i>
                                                    </a>
                                                @endif
                                            </td>
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
            </div>
        </div>
    </section>
@endsection

@include('admin.common.delete-ajax')
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/ajax-live-search.js') }}"></script>
@endpush
