<?php

namespace App\Repositories\Admin;

use App\Models\StoreProfile;
use App\Models\StoresCategory;
use App\Models\Media;
use App\Models\StoreCategory;
use App\Repositories\Interfaces\Admin\StoreProfileInterface;
use App\Traits\ImageTrait;
use App\Traits\SlugTrait;
use Sentinel;

class StoreProfileRepository implements StoreProfileInterface
{
    use ImageTrait;
    use SlugTrait;

    public function get($id)
    {
        return StoreProfile::find($id);
    }

    public function all()
    {
        return StoreProfile::latest();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function getStoresCategory($user_id)
    {

        $store= StoreProfile::where('user_id', $user_id)->first();
        //$categoryIds = $store->categostoresCategory()->pluck('category_id');
        //dd($store);
        $categoryIds = StoresCategory::where('store_id', $store->id)->first()? StoresCategory::where('store_id', $store->id)->first()->category_id : 0;
        return $categoryIds;
    }
    public function store($request): bool
    {
        if (!blank($request->file('logo'))) {
            $requestImage           = $request->file('logo');
            $image_response_logo    = $this->saveImage($requestImage, 'store_logo');
        }
        if (!blank($request->file('banner'))) {
            $requestImage           = $request->file('banner');
            $image_response_banner  = $this->saveImage($requestImage, 'store_banner');
        }
        if (!blank($request->file('main_banner'))) {
            $requestImage           = $request->file('main_banner');
            $image_response_main_banner  = $this->saveImage($requestImage, 'store_main_banner');
        }
                
        $store                     = new StoreProfile();
        $store->seller_id          = $request->seller_id;
        $store->store_name         = $request->store_name;
        $store->user_id            = $request->user_id;
        $store->slug               = $this->getSlug($request->store_name, $request->slug);
        $store->store_code         = $request->store_code;
        $store->postcode           = $request->postcode;
        $store->city               = $request->city;
        $store->store_phone        = $request->store_phone;
        $store->address            = $request->address;
        $store->store_email        = $request->store_email;
        $store->latitude           = $request->latitude;
        $store->longitude          = $request->longitude;
        $store->store_description  = $request->store_description;
        $store->facebook           = $request->facebook;
        $store->linkedin           = $request->linkedin;
        $store->twitter            = $request->twitter;
        $store->youtube            = $request->youtube;
        $store->instagram          = $request->instagram;
        $store->store_comments     = $request->store_comments;
        $store->logo               = $image_response_logo['images'] ?? [];
        $store->banner             = $image_response_banner['images'] ?? [];
        $store->main_banner        = $image_response_main_banner['images'] ?? [];

        $is_closed = [];
        if ($request->has('is_closed0')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed1')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed2')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed3')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed4')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed5')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed6')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;

        $open_time = $request->open_time;
        $close_time = $request->close_time;
        $opening_hours = [];
        for($i=0; $i<count($open_time); $i++){
            $opening_hours[] = Array('open'=>$open_time[$i], 'close'=>$close_time[$i], 'is_closed'=>$is_closed[$i]);
        }
        $store->opening_hours = $opening_hours;
        
        if ($request->has('status')):
            $store->status  = 1;
        else:
            $store->status  = 0;
        endif;
        
        $store->save();
        $storeTmp = StoreProfile::where('seller_id', $request->seller_id)->first();
        $storesCategory=new StoresCategory();
        $storesCategory->store_id=$storeTmp->id;
        $storesCategory->category_id=$request->category != '' ? $request->category : null;
        $storesCategory->save();
        return true;
    }

    public function update($request): bool
    {
        $store = StoreProfile::where('user_id', $request->user_id)->first();

        $store->seller_id          = $request->seller_id;
        $store->store_name         = $request->store_name;
        $store->user_id            = $request->user_id;
        $store->slug               = $this->getSlug($request->store_name, $request->slug);
        $store->store_code         = $request->store_code;
        $store->postcode           = $request->postcode;
        $store->city               = $request->city;
        $store->store_phone        = $request->store_phone;
        $store->address            = $request->address;
        $store->store_email        = $request->store_email;
        $store->latitude           = $request->latitude;
        $store->longitude          = $request->longitude;
        $store->store_description  = $request->store_description;
        $store->facebook           = $request->facebook;
        $store->linkedin           = $request->linkedin;
        $store->twitter            = $request->twitter;
        $store->youtube            = $request->youtube;
        $store->instagram          = $request->instagram;
        $store->store_comments     = $request->store_comments;
        
        $is_closed = [];
        if ($request->has('is_closed0')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed1')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed2')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed3')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed4')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed5')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;
        if ($request->has('is_closed6')):
            array_push($is_closed, 1);
        else:
            array_push($is_closed, 0);
        endif;

        $open_time = $request->open_time;
        $close_time = $request->close_time;
        $opening_hours = [];
        for($i=0; $i<count($open_time); $i++){
            $opening_hours[] = Array('open'=>$open_time[$i], 'close'=>$close_time[$i], 'is_closed'=>$is_closed[$i]);
        }
        $store->opening_hours = $opening_hours;

        if ($request->file('logo') != ''):
            $this->deleteImage($store->logo);
            $requestImage = $request->file('logo');
            $image_response_logo = $this->saveImage($requestImage, 'store_logo');
            $store->logo = $image_response_logo['images'];
        endif;
        if ($request->file('banner') != ''):
            $this->deleteImage($store->banner);
            $requestImage = $request->file('banner');
            $image_response_banner = $this->saveImage($requestImage, 'store_banner');
            $store->banner = $image_response_banner['images'] ?? [];
        endif;
        if ($request->file('main_banner') != ''):
            $this->deleteImage($store->main_banner);
            $requestImage = $request->file('main_banner');
            $image_response_main_banner = $this->saveImage($requestImage, 'store_main_banner');
            $store->main_banner = $image_response_main_banner['images'] ?? [];
        endif;

        if ($request->has('status')):
            $store->status  = 1;
        else:
            $store->status  = 0;
        endif;

        $store->save();
        $storesCategory=new StoresCategory();
        $storesCategory->store_id=$store->id;
        $storesCategory->category_id=$request->category != '' ? $request->category : null;
        $storesCategory->save();
        return true;
    }

    /*public function sellerBySlug($slug)
    {
        return SellerProfile::where('slug',$slug)->first();
    }

    public function shopUpdate($request)
    {
        $shop_page_contents = [];
        $for_mobile = $request->has('for_mobile');

        if ($request->contents):
            foreach ($request->contents as $key => $content):
                $content_number = $request->content_numbers[$key];
                $requested_content = $content . '_' . $content_number;
                if ($content == 'banner'):
                    if ($for_mobile)
                    {
                        $shop_page_contents[$key]['banner']['thumbnail'] = [];
                        $shop_page_contents[$key]['banner']['action_type'] = [];
                        $shop_page_contents[$key]['banner']['action_to'] = [];
                        $banner_thumbnail = 'banner_thumbnail_' . $content_number;
                        $banner_action_type = 'action_type_' . $content_number;
                        $banner_action_id = '';

                        foreach ($request->$banner_thumbnail as $url_key => $thumbnail):

                            $this->getImageArrayRecommendedSize($thumbnail,[1260,620,400,300],[452,320,235,170]);

                            $url = $request->$banner_action_type[$url_key];

                            if ($url == 'product')
                            {
                                $banner_action_id = 'product_id_' . $content_number;
                            }
                            if ($url == 'category')
                            {
                                $banner_action_id = 'category_id_' . $content_number;
                            }
                            if ($url == 'brand')
                            {
                                $banner_action_id = 'brand_id_' . $content_number;
                            }
                            if ($url == 'blog')
                            {
                                $banner_action_id = 'blog_id_' . $content_number;
                            }
                            if ($url == 'seller')
                            {
                                $banner_action_id = 'sl_' . $content_number;
                            }
                            if ($url == 'url')
                            {
                                $banner_action_id = 'slider_url' . $content_number;
                            }
                            $shop_page_contents[$key]['banner']['thumbnail'][] = $thumbnail;
                            $shop_page_contents[$key]['banner']['action_type'][] = $url;
                            $shop_page_contents[$key]['banner']['action_to'][] = $request[$banner_action_id];
                        endforeach;
                    }
                    else{
                        $shop_page_contents[$key]['banner']['thumbnail'] = [];
                        $shop_page_contents[$key]['banner']['url'] = [];
                        $banner_thumbnail = 'banner_thumbnail_' . $content_number;
                        $banner_url = 'banner_url_' . $content_number;
                        foreach ($request->$banner_thumbnail as $url_key => $thumbnail):

                            $this->getImageArrayRecommendedSize($thumbnail,[1260,620,400,300],[452,320,235,170]);

                            $url = $request->$banner_url[$url_key];
                            array_push($shop_page_contents[$key]['banner']['thumbnail'], $thumbnail);
                            array_push($shop_page_contents[$key]['banner']['url'], $url);
                        endforeach;
                        unset($request[$banner_url]);
                    }
                    unset($request[$banner_thumbnail]);
                elseif ($content == 'featured_products' || $content == 'new_arrival' || $content == 'todays_deal' ||
                    $content == 'best_rated_products' || $content == 'best_selling_products' || $content == 'offer_ending_soon'):
                    $shop_page_contents[$key][$content] = $request->$requested_content;
                endif;
                unset($request[$requested_content]);
            endforeach;
        endif;
        $shop_page_content = [["new_arrival"=>"1"],["best_selling_products"=>"3"],["best_rated_products"=>"2"]];
        $seller_profile = Sentinel::getUser()->sellerProfile;
        if ($shop_page_contents == []):
            $shop_page_contents = $shop_page_content;
        endif;
        if($for_mobile):
            $seller_profile->mobile_shop_page_contents = $shop_page_contents;
        else:
            $seller_profile->shop_page_contents = $shop_page_contents;
        endif;
        $seller_profile->save();

        return true;
    }

    public function shopFollower()
    {
        return SellerProfile::join('seller_profile_user','seller_profile_user.seller_profile_id','sellers.id')
            ->selectRaw('sellers.id,seller_profile_user.user_id')->get();
   }
    public function shopFollowerForApi($user = null,$paginate = 10)
    {
        if (!$user) {
            $user   = authUser();
        }
        return SellerProfile::whereHas('followedUsers',function($query) use($user){
            $query->where('user_id',$user->id);
        })->latest()->paginate($paginate);
    }

    public function shopDetails($slug)
    {
        return SellerProfile::where('slug',$slug)->Available()->first();
    }

    public function shopDetailsForMobile($id)
    {
        return SellerProfile::where('user_id',$id)->Available()->first();
    }*/

}
