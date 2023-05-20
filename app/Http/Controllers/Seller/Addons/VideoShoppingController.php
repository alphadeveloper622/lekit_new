<?php

namespace App\Http\Controllers\Seller\Addons;

use App\Http\Controllers\Controller;
use App\Http\Requests\Addon\VideoShoppingRequest;
use App\Http\Requests\Addon\VideoShoppingUpdateRequest;
use App\Repositories\Interfaces\Admin\Addon\VideoShoppingInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VideoShoppingController extends Controller
{
    protected $videoShopping;
    protected $languages;
    protected $product;

    public function __construct(VideoShoppingInterface $videoShopping, LanguageInterface $languages,ProductInterface $product)
    {
        if(settingHelper('seller_video_shopping') != 1 && !addon_is_activated('video_shopping')){
            abort(403);
        }
        $this->videoShopping    = $videoShopping;
        $this->languages        = $languages;
        $this->product          = $product;
    }

    public function index(Request $request){
        $videos = $this->videoShopping->paginate(get_pagination('index_form_paginate'),$request,'');
        return view('seller.video-shopping.index',compact('videos'));
    }
    public function store(VideoShoppingRequest $request){
        if ($this->videoShopping->store($request)):
            Toastr::success(__('Created Successfully'));
            return redirect()->route('seller.video.shopping');
        else:
            Toastr::error(__('Something went wrong, please try again'));
            return back()->withInput();
        endif;
    }
     public function edit($id, Request $request){
         try {
             $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
             $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
             $lang       = $request->lang != '' ? $request->lang : \App::getLocale();

             if ($video_language = $this->videoShopping->getByLang($id, $lang)) :

                 $product_ids = $video_language->videoShopping->product_ids;
                 $products   = $this->product->get($product_ids);

                 return view('seller.video-shopping.edit', compact('video_language', 'languages', 'lang', 'r','products','product_ids'));
             else:
                 Toastr::error(__('Not found'));
                 return back();
             endif;
         } catch (\Exception $e){
             Toastr::error(__($e->getMessage()));
             return back();
         }
     }

     public function update(VideoShoppingUpdateRequest $request){
         if (isDemoServer()):
             Toastr::info(__('This function is disabled in demo server.'));
             return redirect()->back();
         endif;

         if ($this->videoShopping->update($request)):
             Toastr::success(__('Updated Successfully'));
             return redirect($request->r);
         else:
             Toastr::error(__('Something went wrong, please try again'));
             return back()->withInput();
         endif;
     }
    public function statusChange(Request $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;

        if ($this->videoShopping->statusChange($request['data'])):
            $response['message']    = __('Updated Successfully');
            $response['title']      = __('Success');
            $response['status']     = 'success';
            return response()->json($response);
        else:
            $response['message']    = __('Something went wrong, please try again');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
    }
}
