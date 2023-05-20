<?php

namespace App\Http\Controllers\Admin\MobileApps;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Admin\ApiKeyInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Page\PageInterface;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\Slider\SliderInterface;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interfaces\Admin\SettingInterface;
use App\Http\Requests\Admin\MobileApps\MobileAppsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileAppsController extends Controller
{
    protected $setting;
    protected $apiKey;
    private $languages;

    public function __construct(SettingInterface $setting, ApiKeyInterface $apiKey,LanguageInterface $languages)
    {
        $this->setting = $setting;
        $this->apiKey = $apiKey;
        $this->languages = $languages;
    }

    public function apiSetting()
    {
        $data = [
            'apis' => $this->apiKey->all()->paginate(get_pagination('index_form_paginate'))
        ];

        return view('admin.mobile-apps.apis-settings', $data);
    }

    public function androidSetting()
    {
        return view('admin.mobile-apps.android-settings');
    }

    public function iosSetting()
    {
        return view('admin.mobile-apps.ios-settings');
    }

    public function appConfigSetting()
    {
        return view('admin.mobile-apps.app-config');
    }

    public function adsConfigSetting()
    {
        return view('admin.mobile-apps.ads-config');
    }

    public function downloadLink()
    {
        return view('admin.mobile-apps.download-link');
    }

    // Apis Settings Update
    public function apiUpdate(MobileAppsRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        if ($request->mobile_app == 'android'):
            if ($request->has('android_skippable')):
                $request['android_skippable'] = 1;
            else:
                $request['android_skippable'] = 0;
            endif;
        endif;
        if ($request->mobile_app == 'ios'):
            if ($request->has('ios_skippable')):
                $request['ios_skippable'] = 1;
            else:
                $request['ios_skippable'] = 0;
            endif;
        endif;
        if ($request->mobile_app == 'intro'):
            if ($request->has('intro_skippable')):
                $request['intro_skippable'] = 1;
            else:
                $request['intro_skippable'] = 0;
            endif;

            if ($request->has('mandatory_login')):
                $request['mandatory_login'] = 1;
            else:
                $request['mandatory_login'] = 0;
            endif;
        endif;

        DB::beginTransaction();
        try {
            $this->setting->update($request);
            Toastr::success(__('Mobile Apps Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function sliderSettings(SliderInterface $slider)
    {
        try {
            $data = [
                'sliders' => $slider->mobileSliders(get_pagination('index_form_paginate'))
            ];
            return view('admin.mobile-apps.slider', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function mobileBanner(SliderInterface $slider)
    {
        try {
            return view('admin.mobile-apps.banners');
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }
    public function mobileGdpr(Request $request,PageInterface $page)
    {
        try {
            $data = [
                'languages' => $this->languages->all()->orderBy('id', 'asc')->get(),
                'lang'      => $request->lang == '' ? app()->getLocale() : $request->lang,
                'pages'     => $page->allPages(),
                'seller_gdpr'   => settingHelper('mobile_seller_agreement') ? : [],
                'customer_gdpr' => settingHelper('mobile_customer_agreement') ? : [],
                'privacy_gdpr'  => settingHelper('mobile_privacy_agreement') ? : [],
                'payment_gdpr'  => settingHelper('mobile_payment_agreement') ? : []
            ];
            return view('admin.mobile-apps.gdpr',$data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function createSlider(BrandInterface $brands)
    {
        try {
            $data = [
                'brands' => $brands->all()->where('lang', 'en')->where('status', 1)->get(),
            ];
            return view('admin.mobile-apps.sliders.form', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function editSlider($id, Request $request, SliderInterface $slider, BrandInterface $brands)
    {
        try {
            $data = [
                'edit' => $slider->find($id),
                'sliders' => $slider->paginate(get_pagination('index_form_paginate')),
                'r' => $request->r != '' ? $request->r : $request->server('HTTP_REFERER'),
                'brands' => $brands->all()->where('lang', 'en')->where('status', 1)->get(),
            ];
//            $data['slider_language'] = $slider->getByLang($id, $data['lang']);

            return view('admin.mobile-apps.sliders.form', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function homePageBuilder(BrandInterface $brands)
    {
        try {
            $data = [
                'mobile' => 1,
                'brands' => $brands->all()->where('lang', 'en')->where('status', 1)->get()
            ];
            return view('admin.mobile-apps.home-page', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function updateMobileHomeContent(Request $request, PageInterface $page)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $page->updateMobileHomeContent($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back();
        }
    }
}
