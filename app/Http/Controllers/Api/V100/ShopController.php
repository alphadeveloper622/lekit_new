<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\MobileCouponResource;
use App\Http\Resources\ShopResource;
use App\Http\Resources\SiteResource\CouponPaginateResource;
use App\Http\Resources\SiteResource\ProductPaginateResource;
use App\Http\Resources\TopSellerResource;
use App\Repositories\Interfaces\Admin\Blog\BlogInterface;
use App\Repositories\Interfaces\Admin\Marketing\CouponInterface;
use App\Repositories\Interfaces\Admin\MediaInterface;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Admin\SellerInterface;
use App\Repositories\Interfaces\Admin\SellerProfileInterface;
use App\Traits\ApiReturnFormatTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ShopController extends Controller
{
    use ApiReturnFormatTrait;

    public $seller;

    public function __construct(SellerInterface $seller)
    {
        $this->seller = $seller;
    }

    public function allShop(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = ShopResource::collection($this->seller->allSellerAPI(get_pagination('api_paginate')));
            return $this->responseWithSuccess(__('Data Successfully Found'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function bestShop(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = ShopResource::collection($this->seller->bestShop(get_pagination('api_paginate')));
            return $this->responseWithSuccess(__('Data Successfully Found'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function topShop(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = ShopResource::collection($this->seller->topShop(get_pagination('api_paginate')));
            return $this->responseWithSuccess(__('Data Successfully Found'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function shop($id, SellerProfileInterface $seller,MediaInterface $media,ProductInterface $product, CouponInterface $coupon,Request $request,
                         CategoryInterface $category, BrandInterface $brand,BlogInterface $blog,SellerInterface $sellerInterface)
    {
        try {
            $user = null;

            if ($request->token)
            {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                }
            }

            $shop = $seller->get($id);
            $data = [
                'shop' => [
                    'id'                    => $shop->id,
                    'image_82x82'           => $shop->image_82x82,
                    'image_1905x350'        => getFileLink('1905x350',$shop->shop_banner),
                    'shop_name'             => $shop->shop_name,
                    'rating_count'          => round($shop->rating_count,2),
                    'reviews_count'         => $shop->reviews_count,
                    'join_date'             => Carbon::parse($shop->created_at)->format('d M Y'),
                    'is_followed'           => $user && count($shop->followedUsers) > 0 && $shop->followedUsers->where('user_id',$user->id)->first(),
                ],
                'coupons'       => MobileCouponResource::collection($coupon->sellerCoupons($shop->user_id)),
                'products'      => \App\Http\Resources\ProductPaginateResource::collection($product->sellerProducts($shop->user_id)),
            ];

            if ($shop->mobile_shop_page_contents && count($shop->mobile_shop_page_contents) > 0) {
                $data['store'] = $this->parseShopData($shop,$media,$product,$category,$brand,$blog,$sellerInterface,$request);
            }
            return $this->responseWithSuccess(__('Operation Success'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function shopDetails($id, SellerProfileInterface $seller,MediaInterface $media,ProductInterface $product, CouponInterface $coupon,Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $shop = $seller->get($id);

            $user = null;

            if ($request->token)
            {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                }
            }

            $data = [
                'shop' => [
                    'id'                    => $shop->id,
                    'slug'                  => $shop->slug,
                    'contents'              => $this->parseShopData($shop,$media,$product),
                    'image_82x82'           => $shop->image_82x82,
                    'image_1905x350'        => $shop->image_1905x350,
                    'shop_name'             => $shop->shop_name,
                    'rating_count'          => $shop->rating_count,
                    'mobile_shop_page_contents' => $shop->mobile_shop_page_contents,
                    'reviews_count'         => $shop->reviews_count,
                    'shop_tagline'          => $shop->shop_tagline,
                    'is_followed'           => $user && count($shop->followedUsers) > 0 && $shop->followedUsers->where('user_id',$user->id)->first(),
                ],
                'coupons' => new CouponPaginateResource($coupon->sellerCoupons($shop->user_id)),
                'products' => new ProductPaginateResource($product->sellerProducts($shop->user_id)),
            ];
            return $this->responseWithSuccess(__('Operation Success'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function followedShop(Request $request): \Illuminate\Http\JsonResponse
    {
        try {

            $user = null;
            if ($request->token)
            {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            }

            $shops = $this->seller->shop()
                ->withCount('products')
                ->whereHas('users', function($q) use($user){
                    $q->where('user_id',$user->id);
                })
                ->where('verified_at','!=',null)
                ->orderBy('products_count','desc')
                ->latest()
                ->paginate(get_pagination('api_paginate'));

            $data = [
                'shops' => TopSellerResource::collection($shops)
            ];

            return $this->responseWithSuccess(__('Data Successfully Found'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function followUnfollowShop(Request $request,$seller_id): \Illuminate\Http\JsonResponse
    {
        try {
            $user = null;
            if ($request->token)
            {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            }

            $user->sellers()->toggle($seller_id);


            return $this->responseWithSuccess(__('Operation Success'), [], 200);

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function parseShopData($shop, $media, $product,$category,$brand,$blog,$seller,$request)
    {
        $settings = $shop->mobile_shop_page_contents;
        $results = $keys = [];

        if ($settings && settingHelper('seller_system') == 1) {
            foreach ($settings as $key => $setting) {
                foreach ($setting as $set_key => $item) {
                    if ($set_key == 'banner') {
                        $data['section_title'] = 'banner';
                        $banners = [];
                        if (array_key_exists('action_type',$item))
                        {
                            $action_types = $item['action_type'];
                            foreach ($item['thumbnail'] as $banner_key => $thumbnail) {
                                $image = $media->get($thumbnail);
                                $action_title = '';
                                $action_id = '';
                                if ($action_types[$banner_key] == 'product' && is_array($item['action_to'][$banner_key]) && array_key_exists($banner_key,$item['action_to'][$banner_key])) {
                                    $action_id = $item['action_to'][$banner_key][$banner_key];
                                    $banner_product = $product->get($action_id);
                                    $action_title =$banner_product ? nullCheck($banner_product->getTranslation('name', apiLanguage($request->lang))) : '';
                                } else if ($action_types[$banner_key] == 'category' && is_array($item['action_to'][$banner_key]) && array_key_exists($banner_key,$item['action_to'][$banner_key])) {
                                    $action_id = $item['action_to'][$banner_key][$banner_key];
                                    $banner_category = $category->get($action_id);
                                    $action_title = $banner_category ? nullCheck($banner_category->getTranslation('title', apiLanguage($request->lang))) : '';
                                } else if ($action_types[$banner_key] == 'brand' && is_array($item['action_to'][$banner_key]) && array_key_exists($banner_key,$item['action_to'][$banner_key])) {
                                    $action_id = $item['action_to'][$banner_key][$banner_key];
                                    $banner_brand = $brand->get($action_id);
                                    $action_title = $banner_brand ? nullCheck($banner_brand->getTranslation('title', apiLanguage($request->lang))) : '';

                                } else if ($action_types[$banner_key] == 'seller' && is_array($item['action_to'][$banner_key]) && array_key_exists($banner_key,$item['action_to'][$banner_key])) {
                                    $action_id = $item['action_to'][$banner_key][$banner_key];
                                    $banner_seller = $seller->getSeller($action_id);
                                    $action_title = $banner_seller ? nullCheck($banner_seller->shop_name) : '';
                                } else if ($action_types[$banner_key] == 'blog' && is_array($item['action_to'][$banner_key]) && array_key_exists($banner_key,$item['action_to'][$banner_key])) {
                                    $action_id = $item['action_to'][$banner_key][$banner_key];
                                    $banner_blog = $blog->get($action_id);
                                    $action_title = $banner_blog ? nullCheck($banner_blog->getTranslation('title', apiLanguage($request->lang))) : '';
                                } else if ($action_types[$banner_key] == 'url') {
                                    $action_title = nullCheck($item['action_to'][$banner_key][$banner_key]);
                                }

                                $banners[] = [
                                    'thumbnail' => @is_file_exists($image->image_variants['image_300x170'], $image->image_variants['storage']) ? @get_media($image->image_variants['image_300x170'], $image->image_variants['storage']) : static_asset('images/default/default-image-300x170.png'),
                                    'action_type' => $action_types[$banner_key],
                                    'action_to' => $action_title,
                                    'action_id' => $action_id,
                                ];
                            }
                            $results = $this->keyDefine('banners', $key, $banners, $results);
                        }
                    }
                    if ($set_key == 'featured_products') {
                        $featured_products = \App\Http\Resources\ProductPaginateResource::collection($product->featuredProducts($item));
                        $results = $this->keyDefine('featured_products', $key, $featured_products, $results);
                        $keys[] = 'featured_products';
                    }
                    if ($set_key == 'new_arrival') {
                        if (in_array('new_arrival', $keys)) {
                            $position = array_search('new_arrival', array_values($keys));
                            $new_products = $results[$position]['products'];
                        } else {
                            $new_products = \App\Http\Resources\ProductPaginateResource::collection($product->newProducts($shop->user_id, 4));
                        }
                        $results = $this->keyDefine('new_arrival', $key, $new_products, $results);
                        $keys[] = 'new_arrival';
                    }
                    if ($set_key == 'best_selling_products') {
                        if (in_array('best_selling_products', $keys)) {
                            $position = array_search('best_selling_products', array_values($keys));
                            $best_selling_products = $results[$position]['products'];
                        } else {
                            $best_selling_products = \App\Http\Resources\ProductPaginateResource::collection($product->sellerBestSelling($shop->user_id, 12));
                        }

                        $results = $this->keyDefine('best_selling_products', $key, $best_selling_products, $results);
                        $keys[] = 'best_selling_products';
                    }
                    if ($set_key == 'offer_ending_soon') {
                        if (in_array('offer_ending_soon', $keys)) {
                            $position = array_search('offer_ending_soon', array_values($keys));
                            $offer_ending_soon_products = $results[$position]['products'];
                        } else {
                            $offer_ending_soon_products = \App\Http\Resources\ProductPaginateResource::collection($product->sellerOfferEnding($shop->user_id, 12));
                        }

                        $results = $this->keyDefine('offer_ending_soon', $key, $offer_ending_soon_products, $results);
                        $keys[] = 'offer_ending_soon';
                    }
                    if ($set_key == 'best_rated_products') {
                        if (in_array('best_rated_products', $keys)) {
                            $position = array_search('best_rated_products', array_values($keys));
                            $best_rated_products_products = $results[$position]['products'];
                        } else {
                            $best_rated_products_products = \App\Http\Resources\ProductPaginateResource::collection($product->sellerOfferEnding($shop->user_id, 12));
                        }

                        $results = $this->keyDefine('best_rated_products', $key, $best_rated_products_products, $results);
                        $keys[] = 'best_rated_products';
                    }
                }
            }
        }
        return $results;
    }

    protected function keyDefine($key, $index, $data, $results)
    {
        if ($key == 'banners') {
            $results[]=[
                'section_type'  => 'banners',
                'title'         => 'Banners',
                $key            => $data
            ];
        }
        if($key == 'best_selling_products'):
            $results[]=[
                'section_type'  => 'best_selling',
                'title'         => 'Best Selling',
                'products'      => $data
            ];
        endif;
        if($key == 'offer_ending_soon'):
            $results[]=[
                'section_type'  => 'offer_ending_soon',
                'title'         => 'Offer Ending Soon',
                'products'      => $data
            ];
        endif;
        if($key == 'featured_products'):
            $results[]=[
                'section_type'  => 'featured_product',
                'title'         => 'Featured Product',
                'products'      => $data
            ];
        endif;
        if($key == 'new_arrival'):
            $results[]=[
                'section_type'          => 'new_arrival',
                'title'                 => 'New Arrival',
                'products'              => $data
            ];
        endif;
        if($key == 'best_rated_products'):
            $results[]=[
                'section_type'          => 'best_rated_products',
                'title'                 => 'Best Rated Products',
                'products'              => $data
            ];
        endif;
        return $results;
    }

    public function deleteCoupon(Request $request,CouponInterface $coupons): \Illuminate\Http\JsonResponse
    {
        try {
            $user = null;
            if ($request->token)
            {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            }
            $request['user_id'] = $user->id;
            $coupons = settingHelper('coupon_system') == 1 ? $coupons->deleteCoupon($request) : [];
            return response()->json([
                'data' => $coupons,
                'success' => 'Successfully Deleted',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
