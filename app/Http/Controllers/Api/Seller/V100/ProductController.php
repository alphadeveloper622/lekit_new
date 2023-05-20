<?php

namespace App\Http\Controllers\Api\Seller\V100;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiProductRequest;
use App\Http\Resources\Api\Seller\ProductListResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductPaginateResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\SiteResource\AttributeResource;
use App\Http\Resources\SiteResource\BrandResource;
use App\Http\Resources\SiteResource\ProductResource;
use App\Repositories\Interfaces\Admin\CommonInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\AttributeInterface;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\Product\ColorInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Site\ReviewInterface;
use App\Traits\ApiReturnFormatTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductController extends Controller
{

    use ApiReturnFormatTrait;
    protected $products;
    protected $categories;
    protected $brands;
    protected $colors;
    protected $attributes;
    protected $languages;

    public function __construct(ProductInterface $products,
                                CategoryInterface $categories,
                                BrandInterface $brands,
                                ColorInterface $colors,
                                AttributeInterface $attributes,
                                LanguageInterface $languages)
    {
        $this->products         = $products;
        $this->categories       = $categories;
        $this->brands           = $brands;
        $this->colors           = $colors;
        $this->attributes       = $attributes;
        $this->languages        = $languages;
    }

    public function index(Request $request)
    {
        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        if(!$request->page){
            $request['page'] = 1;
        }
        $request['sq'] = $user->id;
        try {
            $products       = $this->products->paginate($request, $request->status ,get_pagination('api_paginate'),'');
            if ($products->isEmpty()):
                return response()->json([
                    'success'   => false,
                    'message'   => 'Product Not Found',
                ],404);
            endif;
            $products = ProductResource::collection($products);
            return response()->json([
                'success'   => true,
                'message'   => 'Product Fetched Successfully',
                'data'   => $products,
            ],200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function store(ApiProductRequest $request)
    {
        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }

        try{
            if($user->user_type == 'seller' && $user->sellerProfile->verified_at != null){
                $product = $this->products->store($request);
            }
            return $this->responseWithSuccess(__('Product Created Successfully'), $product, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function productCreateFormItems(Request $request){

        try{
            $categories     = $this->categories->allCategory()->where('parent_id', null)->where('status',1);
            $brands         = $this->brands->all()->where('lang','en')->where('status',1)->get();
            $colors         = $this->colors->all()->where('lang', 'en')->get();
            $attributes     = $this->attributes->all()->where('lang', 'en')->get();
            $r              = $request->r != ''? $request->r : $request->server('HTTP_REFERER');

            $data = [
                'categories'    => CategoryResource::collection($categories),
                'brands'        => BrandResource::collection($brands),
                'colors'        => ColorResource::collection($colors),
                'attributes'    => AttributeResource::collection($attributes),
                'r'             => $r,
            ];
            return $this->responseWithSuccess(__('Product Create Form Items Fetched Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function digitalProducts(Request $request, $status = null){

        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $request['sq']  = $user->id;
            $products       = $this->products->paginate($request, $status ,get_pagination('pagination'),'digital');
            $selected_category = null;
            if (isset($request->c)):
                $selected_category = $this->categories->get($request->c);
            endif;

            $data = [
                'products'=> new ProductListResource($products),
                'selected_category'=> $selected_category,
                'status'=> $status,
            ];
            return $this->responseWithSuccess(__('Product Fetched Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function catalogProducts(Request $request, $status = null){

        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $request['sq']  = $user->id;
            $products       = $this->products->paginate($request, $status ,\Config::get('yrsetting.paginate'),'catalog');
            $selected_category = null;
            if (isset($request->c)):
                $selected_category = $this->categories->get($request->c);
            endif;

            $data = [
                'products'=> new ProductListResource($products),
                'selected_category'=> $selected_category,
                'status'=> $status,
            ];
            return $this->responseWithSuccess(__('Product Fetched Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function classifiedProducts(Request $request, $status = null){

        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $request['sq']  = $user->id;
            $products       = $this->products->paginate($request, $status ,\Config::get('yrsetting.paginate'),'classified');
            $selected_category = null;
            if (isset($request->c)):
                $selected_category = $this->categories->get($request->c);
            endif;

            $data = [
                'products'=> new ProductListResource($products),
                'selected_category'=> $selected_category,
                'status'=> $status,
            ];
            return $this->responseWithSuccess(__('Product Fetched  Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function createDigitalProduct(Request $request){

        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }

        $categories     = $this->categories->allCategory()->where('parent_id', null)->where('status',1);
        $brands         = $this->brands->all()->where('lang','en')->where('status',1)->get();
        $colors         = $this->colors->all()->where('lang', 'en')->get();
        $attributes     = $this->attributes->all()->where('lang', 'en')->get();
        $is_digital     = 1;
        $r              = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
        return view('seller.products.form',compact('categories','brands','colors','attributes','is_digital','r'));
    }

    public function delete(Request $request,CommonInterface $common)
    {

        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $common->sellerProductDelete($request);
            return response()->json([
                'success'   => true,
                'message'   => 'Product Deleted Successfully',
            ],200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function details($id,Request $request,ColorInterface $color,AttributeInterface $attribute,ReviewInterface $review)
    {
        try {
            $user = null;
            if ($request->bearerToken()) {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            }

            $product = $this->products->get($id);
            if (!$product)
            {
                return $this->responseWithError(__('Product Not Found'), [], 404);
            }
            $stock                              = $product->stock;
            $first_stock                        = '';

            $images = $wholesale_prices = $description_images = [];
            $image_no                           = 0;

            if($product->images)
            {
                foreach ($product->images as $image) {
                    if ($image && (arrayCheck(['image_320x320'], @$image['storage']) || @is_file_exists($image['image_320x320'], @$image['storage'])) || (arrayCheck(['image_320x320'], @$image['storage']) || @is_file_exists($image['image_387x200'], @$image['storage'])))
                    {
                        if (arrayCheck(['image_320x320'], @$image['storage']) && is_file_exists($image['image_387x200'], @$image['storage']))
                        {
                            $size = 'image_387x280';
                        }
                        else{
                            $size = 'image_320x320';
                        }
                        $images[] = @get_media(@$image[$size], @$image['storage']);

                        $image_no++;
                    }
                }
            }

            if ($product->has_variant) {
                foreach ($stock as $key => $item) {
                    if ($key == 0) {
                        $first_stock = $item;
                    }

                    if ($item->image && (arrayCheck(['image_320x320'], @$item->image['storage']) || @is_file_exists($item->image['image_320x320'], @$item->image['storage'])) || (arrayCheck(['image_320x320'], @$item->image['storage']) || @is_file_exists($item->image['image_387x200'], @$item->image['storage'])))
                    {
                        if (arrayCheck(['image_320x320'], @$item->image['storage']) && is_file_exists($item->image['image_387x200'], @$item->image['storage']))
                        {
                            $size = 'image_387x280';
                        }
                        else{
                            $size = 'image_320x320';
                        }
                        $images[] = @get_media(@$item->image[$size], @$item->image['storage']);

                        $image_no++;
                    }
                }
            } else if (addon_is_activated('wholesale')) {
                $first_stock = $product->firstStock;
                foreach($first_stock->wholeSalePrice as $item){
                    $item->price = (string)$item->price;
                }
                $wholesale_prices =  $first_stock->wholeSalePrice;
            }

            if ($product->thumbnail && count($product->thumbnail) > 0 && !arrayCheck('320x320',$product->thumbnail) && !@is_file_exists($product->thumbnail['320x320'], $product->thumbnail['storage']))
            {
                $large_size_image = '320x320';
            }
            else{
                $large_size_image = '387x280';
            }

            if ($product->description_images && count($product->description_images) > 0)
            {
                foreach ($product->description_images as $description_image) {

                    if (is_file_exists($description_image['image'],$description_image['storage']))
                    {
                        $description_images[] = get_media($description_image['image'],$description_image['storage']);
                    }
                }
            }

            $images[] = @getFileLink($large_size_image, @$product->thumbnail);

            $now = Carbon::now()->format('Y-m-d H:i:s');

            $reviews = $review->productReviews($product->id,get_pagination('api_paginate'));

            $name = $product->getTranslation('name',apiLanguage($request->lang));
            $data = [
                'title'                     => $name,
                'special_discount_type'     => nullCheck($product->special_discount_type),
                'special_discount'          => number_format($product->special_discount_check,3,'.',''),
                'discount_price'            => (string)$product->discount_percentage,
                'price'                     => (string)$product->price,
                'rating'                    => (double)$product->rating,
                'total_reviews'             => count($reviews),
                'current_stock'             => (int)$product->current_stock,
                'minimum_order_quantity'    => (int)$product->minimum_order_quantity,
                'reward'                    => (double)$product->reward,
                'total_images'              => count($images),
                'images'                    => $images,
                'colors'                    => ColorResource::collection($color->colorByIds($product->colors)),
                'attributes'                => \App\Http\Resources\Api\AttributeResource::collection($attribute->attributes(array_keys($product->selected_variants),$product->selected_variants_ids)),
                'special_discount_start'    => $product->is_wholesale != 1 && $product->special_discount_start <= $now && $product->special_discount_end >= $now ? $product->special_discount_start : '',
                'special_discount_end'      => $product->is_wholesale != 1 && $product->special_discount_end >= $now ? $product->special_discount_end : '',
                'description'               => route('api.product.details',$product->id),
                'details'                   => $product->getTranslation('description',apiLanguage($request->lang)),
                'is_favourite'              => $user && count($product->wishlists) && $product->wishlists->where('user_id', $user->id)->first(),
                'short_description'         => html_entity_decode($product->getTranslation('short_description',apiLanguage($request->lang))),
                'has_variant'               => (bool)$product->has_variant == 1,
                'is_wholesale'              => (bool) (addon_is_activated('wholesale') ? $product->is_wholesale : false),
                'is_catalog'                => (bool)$product->is_catalog,
                'is_featured'               => (bool)$product->is_featured,
                'is_classified'             => (bool)$product->is_classified,
                'is_digital'                => (bool)$product->is_digital,
                'is_refundable'             => (bool)$product->is_refundable,
                'description_images'        => $description_images,
                'specifications'            => $product->getTranslation('specification',apiLanguage($request->lang)) ? : '',
                'reviews'                   => ReviewResource::collection($reviews),
                'is_reviewed'               => $user && count($reviews) && $reviews->where('user_id', $user->id)->first(),
                'delivery'                  => $product->is_digital == 0 ? $product->estimated_shipping_days : 0,
                'return'                    => addon_is_activated('refund') ? (int)settingHelper('refund_request_time') : 0,
                'stock_visibility'          => !($product->is_catalog == 1 || $product->is_classified == 1) && $product->is_digital != 1 && $product->stock_visibility != 'hide_stock' ?
                    ($product->stock_visibility == 'visible_with_quantity' ? $first_stock->current_stock : __('ask_about_this_product')) : '',
                'wholesale_prices'          => settingHelper('wholesale_price_variations_show') == 1 && $product->is_wholesale == 1 && count($wholesale_prices) > 0 ? $wholesale_prices : [],
                'classified_contact_info'   => $product->is_classified == 1 ? [
                    'name'      => nullCheck(@$product['contact_info']['contact_name']),
                    'phone'     => nullCheck(@$product['contact_info']['phone_no']),
                    'email'     => nullCheck(@$product['contact_info']['email']),
                    'address'   => nullCheck(@$product['contact_info']['address']),
                    'others'    => nullCheck(@$product['contact_info']['others']),
                ] : null,
                'catalog_external_link' => $product->is_catalog == 1 ? $product->external_link : '',
                'form'                      => [
                    'product_id'        => $product->id,
                    'quantity'          => $product->minimum_order_quantity ? (int)$product->minimum_order_quantity : 1,
                ],
                'links' => [
                    'facebook' => 'https://www.facebook.com/sharer/sharer.php?u='.url('product/'.$product->slug),
                    'twitter' => 'https://twitter.com/intent/tweet?text='.$name.'&url='.url('product/'.$product->slug),
                    'linkedin' => 'https://www.linkedin.com/sharing/share-offsite?mini=true&url='.url('product/'.$product->slug).'&title='.$name.'&summary=Extra+linkedin+summary+can+be+passed+here',
                    'whatsapp' => 'https://wa.me/?text='.url('product/'.$product->slug),
                ]
            ];

            return $this->responseWithSuccess(__('Product Retrieved Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function search(Request $request)
    {
        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $data = ProductPaginateResource::collection($this->products->search($request->key,get_pagination('api_paginate'),$user));
            return $this->responseWithSuccess(__('Product Found Successfully'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function restoreProduct($id): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $product = $this->products->restore($id);
            if (!$product)
            {
                return $this->responseWithError(__('Product Not Found'), [], 404);
            }

            DB::commit();
            return $this->responseWithSuccess(__('Product Restored Successfully'), [], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }
}
