<?php

namespace App\Repositories\Admin\Marketing;

use App\Models\Campaign;
use App\Models\CampaignLanguage;
use App\Models\CampaignProduct;
use App\Models\Product;
use App\Repositories\Interfaces\Admin\Marketing\CampaignInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Traits\ImageTrait;
use App\Traits\SlugTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Sentinel;

class CampaignRepository implements CampaignInterface
{
    use ImageTrait;
    use SlugTrait;

    protected $products;

    public function __construct(ProductInterface $products)
    {
        $this->products = $products;
    }

    public function get($id)
    {
        return Campaign::find($id);

    }

    public function getBySlug($slug)
    {
        return Campaign::where('slug',$slug)->first();

    }

    public function getByLang($id, $lang)
    {
        if($lang == null):
            $campaignByLang = CampaignLanguage::with('campaign', 'campaign.campaignProducts','campaign.campaignProducts.product')->where('lang', 'en')->where('campaign_id', $id)->first();
        else:
            $campaignByLang = CampaignLanguage::with('campaign', 'campaign.campaignProducts','campaign.campaignProducts.product')->where('lang', $lang)->where('campaign_id', $id)->first();

        if(blank($campaignByLang)):
                $campaignByLang = CampaignLanguage::with('campaign', 'campaign.campaignProducts','campaign.campaignProducts.product')->where('lang', 'en')->where('campaign_id', $id)->first();
                $campaignByLang['translation_null'] = 'not-found';
            endif;
        endif;

        return $campaignByLang;

    }

    public function all()
    {
        return Campaign::latest();
    }
    public function getCampaignProduct($id){
        return CampaignProduct::where('product_id',$id)->first();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function store($request)
    {
            $campaign = new Campaign();

            $campaign->slug               = $this->getSlug($request->title, $request->slug);
            $campaign->background_color   = $request->background_color;
            $campaign->text_color         = $request->text_color;

            $dates = explode(" - ", $request->date);

            $campaign->start_date         = Carbon::createFromFormat('m-d-Y g:ia', $dates[0]);
            $campaign->end_date           = Carbon::createFromFormat('m-d-Y g:ia', $dates[1]);

            if ($request->thumbnail != ''):
                $campaign->thumbnail            = $this->getImageArrayRecommendedSize($request->thumbnail,[406,374],[235,374]);
                $campaign->thumbnail_id         = $request->thumbnail;
            else:
                $campaign->thumbnail         = [];
                $campaign->thumbnail_id      = null;
            endif;
            if ($request->banner != ''):
                $campaign->banner         = $this->getImageWithRecommendedSize($request->banner,1920,412,true);
                $campaign->banner_id      = $request->banner;
            else:
                $campaign->banner         = [];
                $campaign->banner_id      = null;
            endif;

            if(isset($request->status)):
                $campaign->status             = 1;
            else:
                $campaign->status             = 0;
            endif;
            if(isset($request->featured)):
                $campaign->featured           = 1;
            else:
                $campaign->featured             = 0;
            endif;
            $campaign->save();

            $campaignLang = new CampaignLanguage();
            $campaignLang->campaign_id  = $campaign->id;
            $campaignLang->lang         = 'en';
            $campaignLang->title        = $request->title;
            $campaignLang->description  = $request->description;
            $campaignLang->save();

            $ids            =  $request->product_id;

            foreach ($ids as $key => $value):

                $campaignProduct = CampaignProduct::where('product_id', $value)->first();
                if (blank($campaignProduct)):
                    $campaignProduct    = new  CampaignProduct();
                endif;
                $campaignProduct->campaign_id   = $campaign->id;
                $campaignProduct->product_id    = $value;
                $campaignProduct->user_id       = Sentinel::getUser()->user_type == 'seller' ? Sentinel::getUser()->id : 1;
                $campaignProduct->status        = 'accepted';
                $campaignProduct->discount_type = $request['discount_type_'.$value];
                $campaignProduct->discount      = $request['discount_type_'.$value] == 'percentage' ? $request['discount_'.$value] : priceFormatUpdate($request['discount_'.$value],settingHelper('default_currency'));
                $campaignProduct->save();

                $this->updateDiscount($campaignProduct, 'update');
            endforeach;
            return true;
    }

    public function update($request){
            $campaign = Campaign::find($request->campaign_id);

            $campaign->slug               = $this->getSlug($request->title, $request->slug);
            $campaign->background_color   = $request->background_color;
            $campaign->text_color         = $request->text_color;

            $dates = explode(" - ", $request->date);

            $campaign->start_date         = Carbon::createFromFormat('m-d-Y g:ia', $dates[0]);
            $campaign->end_date           = Carbon::createFromFormat('m-d-Y g:ia', $dates[1]);

            if ($request->thumbnail != ''):
                $campaign->thumbnail            = $this->getImageArrayRecommendedSize($request->thumbnail,[406,374],[235,374]);
                $campaign->thumbnail_id         = $request->thumbnail;
            else:
                $campaign->thumbnail         = [];
                $campaign->thumbnail_id      = null;
            endif;
            if ($request->banner != ''):
                $campaign->banner         = $this->getImageWithRecommendedSize($request->banner,1920,412,true);
                $campaign->banner_id      = $request->banner;
            else:
                $campaign->banner         = [];
                $campaign->banner_id      = null;
            endif;

            if(isset($request->status)):
                $campaign->status             = 1;
            else:
                $campaign->status             = 0;
            endif;
            if(isset($request->featured)):
                $campaign->featured           = 1;
            else:
                $campaign->featured           = 0;
            endif;

            $campaign->save();


            if ($request->campaign_lang_id == '') :
                $this->campaignLanguageStore($request);
            else:
                $this->campaignLanguageUpdate($request);
            endif;

            $ids            = $request->product_id;

            CampaignProduct::where('campaign_id',$request->campaign_id)->delete();

            if($ids != null):
                foreach ($ids as $key => $value):
                    $campaignProduct                = new CampaignProduct();

                    CampaignProduct::where('product_id', $value)->delete();
                    $campaignProduct->campaign_id   = $campaign->id;
                    $campaignProduct->product_id    = $value;
                    $campaignProduct->user_id       = Sentinel::getUser()->user_type == 'seller' ? Sentinel::getUser()->id : 1;
                    $campaignProduct->status        = 'accepted';
                    $campaignProduct->discount_type = $request['discount_type_'.$value];
                    $campaignProduct->discount      = $request['discount_type_'.$value] == 'percentage' ? $request['discount_'.$value] : priceFormatUpdate($request['discount_'.$value],settingHelper('default_currency'));
                    $campaignProduct->save();

                    $this->updateDiscount($campaignProduct, 'update');
                endforeach;
            endif;
            return true;
    }
    protected function campaignLanguageStore($request){
        $campaignLang               = new CampaignLanguage();
        $campaignLang->campaign_id  = $request->campaign_id;
        $campaignLang->lang         =  $request->lang != '' ? $request->lang : 'en' ;
        $campaignLang->title        = $request->title;
        $campaignLang->save();

        return $campaignLang;
    }
    protected function campaignLanguageUpdate($request){

        $campaignLang               = CampaignLanguage::where('id' ,$request->campaign_lang_id)->first();
        $campaignLang->campaign_id  = $request->campaign_id;
        $campaignLang->lang         =  $request->lang != '' ? $request->lang : 'en';
        $campaignLang->title        = $request->title;
        $campaignLang->description  = $request->description;
        $campaignLang->save();

        return $campaignLang;
    }

    public function statusChange($request)
    {
            $campaign            = $this->get($request['id']);
            $campaign->status    = $request['status'];
            $campaign->save();
            return true;
    }

    public function featuredChange($request){
            $campaign              = $this->get($request['id']);
            $campaign->featured    = $request['status'];
            $campaign->save();
            return true;
    }

    public function flashSaleChange($request){

            $allCampaign               = $this->all()->get();
            foreach ($allCampaign as $campaign){
                $campaign->flash_sale  = $campaign->id ==  $request['id'] ? $request['status'] : 0;
                $campaign->save();
            }
            return true;
    }

    public function campaignProductStore($request)
    {
            $campaignProduct = CampaignProduct::where('campaign_id', $request->campaign_id)->where('product_id', $request->product_id)->first();

            if (blank($campaignProduct)):
                $campaignProduct                    = new CampaignProduct();
            endif;

            $campaignProduct->campaign_id       = $request->campaign_id;
            $campaignProduct->product_id        = $request->product_id;
            $campaignProduct->user_id           = Sentinel::getUser()->user_type == 'seller' ? Sentinel::getUser()->id : 1;
            $campaignProduct->status            = 'accepted';
            $campaignProduct->discount_type     = $request->discount_type;
            $campaignProduct->discount          = priceFormatUpdate($request->discount,settingHelper('default_currency'));
            $campaignProduct->save();
            return true;
    }

    public function campaignProductRequests($id, $limit){
        return CampaignProduct::with('campaign','user')
                                ->when(Sentinel::getUser()->user_type == 'seller', function ($q){
                                    $q->where('user_id', Sentinel::getUser()->id);
                                })
                                ->when(Sentinel::getUser()->user_type != 'seller', function ($q){
                                    $q->where('user_id', '!=', 1);
                                })
                                ->where('campaign_id', $id)
                                ->latest()->paginate($limit);
    }

    public function campaignProductRequestStatus($request){
            $campaignProduct    = CampaignProduct::findOrFail($request->id);
            if($request->status == 'accepted'):
                $campaignProduct->status = 'accepted';
                $campaignProduct->save();

                CampaignProduct::where('product_id', $campaignProduct->product_id)->where('id', '!=', $campaignProduct->id)->delete();

                $this->updateDiscount($campaignProduct, 'update');

            elseif($request->status == 'rejected' || $request->status == 'pending'):
                $campaignProduct->status = $request->status;
                $campaignProduct->save();
                $this->updateDiscount($campaignProduct);
            endif;
            return true;
    }

    public function updateDiscount($campaignProduct, $type = 'remove')
    {
        try {
            //replace previously inserted discount record
            $product    = $this->products->get($campaignProduct->product_id);
            if ($type == 'update'):
                $product->special_discount_type     = $campaignProduct->discount_type;
                $product->special_discount          = $campaignProduct->discount;
                $product->special_discount_start    = $campaignProduct->campaign->start_date;
                $product->special_discount_end      = $campaignProduct->campaign->end_date;
            else:
                $product->special_discount_type     = null;
                $product->special_discount          = 0.00;
                $product->special_discount_start    = null;
                $product->special_discount_end      = null;
            endif;
            $product->save();
            //end replacing
            return true;
        } catch (\Exception $e){
            return false;
        }
    }

    public function allCampaignProductRequests($limit){
        return CampaignProduct::with('campaign')->where('status','pending')->paginate($limit);
    }

    public function storeRequest($request)
    {
            foreach ($request->product_id as $key => $product_id):
                $campaign_product = new CampaignProduct();
                $campaign_product->campaign_id       = $request->campaign_id;
                $campaign_product->product_id        = $product_id;
                $campaign_product->user_id           = Sentinel::getUser()->id;
                $campaign_product->status            = 'pending';
                $campaign_product->discount_type     = $request['discount_type_'.$product_id];
                $campaign_product->discount          = $request['discount_'.$product_id];
                $campaign_product->save();
            endforeach;
            return true;
    }

    public function campaignByIds($ids)
    {
        return Campaign::whereIn('id',$ids)->select('id','banner','slug','thumbnail','start_date','end_date')->where('start_date','<=',now())->where('end_date','>=',now())->where('status',1)->latest()->take(3)->get();
    }

    public function campaigns($limit)
    {
        return $this->all()->with('currentLanguage')->where('start_date','<=',now())->where('end_date','>=',now())->where('status',1)->paginate($limit);
    }

    public function campaignProducts($id,$user)
    {
        return Product::whereHas('campaign', function ($q) use ($id,$user){
            $q->where('campaign_id', $id)->where('user_id',$user->id);
        })->latest()->get();
    }

    public function removeProduct($data)
    {
        return CampaignProduct::where('product_id',$data['product_id'])->where('campaign_id',$data['campaign_id'])->where('user_id',$data['user_id'])->delete();
    }

    public function storeProducts($data): bool
    {
        if (arrayCheck('product_id',$data))
        {
            $products = Product::whereIn('id',$data['product_id'])->where('user_id',$data['user_id'])->count();
            if ($products != count($data['product_id']))
            {
                return false;
            }
            $rows = [];

            foreach ($data['product_id'] as $key => $product_id):
                $rows[] = [
                    'campaign_id'   => $data['campaign_id'],
                    'product_id'    => $product_id,
                    'user_id'       => $data['user_id'],
                    'status'        => 'pending',
                    'discount_type' => arrayCheck($product_id,$data['discount_type']) ? $data['discount_type'][$product_id] : 'flat',
                    'discount'      => arrayCheck($product_id,$data['discount']) ? $data['discount'][$product_id] : 0,
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            endforeach;

            if (count($rows) > 0)
            {
                $total_rows = array_chunk($rows,5000);
                foreach ($total_rows as $row)
                {
                    CampaignProduct::insert($row);
                }
            }
        }

        return true;
    }

    public function sellerCampaignProducts($id,$user_id)
    {
        return CampaignProduct::with('product')->whereHas('campaign', function ($q) use ($id){
            $q->where('campaign_id', $id);
        })->whereHas('product')->where('user_id', $user_id)->paginate(get_pagination('api_paginate'));
    }
}
