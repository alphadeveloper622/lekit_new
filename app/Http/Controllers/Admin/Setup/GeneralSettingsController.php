<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\GeneralSettingRequest;
use App\Http\Requests\Admin\Setup\OptimizationRequest;
use App\Http\Requests\Admin\UpdateServerRequest;
use App\Repositories\Interfaces\Admin\CurrencyInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\SettingInterface;
use App\Repositories\Interfaces\Admin\ShippingInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Traits\UpdateTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralSettingsController extends Controller
{
    use UpdateTrait;
    private $lanuages;
    private $settings;
    private $currencies;

    public function __construct(LanguageInterface $languages, ShippingInterface $shipping, SettingInterface $settings, CurrencyInterface $currencies)
    {
        $this->lanuages         = $languages;
        $this->settings         = $settings;
        $this->currencies       = $currencies;
        $this->shipping         = $shipping;
    }
    public function index(){
        $currencies           = $this->currencies->all()->get();
        $countries            = $this->shipping->getAllCountries();
        $available_languages  = $this->lanuages->all()->orderBy('id','asc')->get();
        $timezones            = $this->settings->timezones();
        return view('admin.system-setup.general-settings',compact('available_languages','timezones', 'currencies','countries'));
    }

    public function update(GeneralSettingRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->settings->update($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function optimizationUpdate(OptimizationRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->settings->update($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function systemName(Request $request)
    {
        return settingHelper($request->title,$request->lang);
    }

    public function updateServerForm()
    {
        $fields = [
            'item_id' => isAppMode() ? '38944711' : '37142846',
            'purchase_code' => settingHelper('purchase_code'),
            'current_version' => settingHelper('current_version')
        ];
        $response = false;

        if (env('DEV_MODE') == 'on')
        {
            $url = "https://desk.spagreen.net/version-check-including-beta";
        }
        else{
            $url = "https://desk.spagreen.net/version-check";
        }

        $request = curlRequest($url, $fields);

        if (property_exists($request,'status') && $request->status):
            $response = $request->release_info;
        endif;

        return view('admin.settings.updater', compact('response'));
    }

    public function updateSystem(UpdateServerRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        try {

            dd(true);
            return response()->json([
                'message' => __('Update Successfully')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => __('Update Successfully')
            ]);
        }

    }

    public function serverInfo()
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        return view('admin.settings.server-info');
    }

    public function downloadUpdate(): \Illuminate\Http\JsonResponse
    {
        try {
            if (isDemoServer())
            {
                return response()->json([
                    'message' => __('This function is disabled in demo server.'),
                    'type' => __('Error') . ' !',
                    'class' => 'danger',
                ]);
            }

            $update = $this->downloadUpdateFile();

            if (is_string($update))
            {
                return response()->json([
                    'message' => $update,
                    'type' => __('Error') . ' !',
                    'class' => 'danger',
                ]);
            }

            return response()->json([
                'type' => __('Success') . ' !',
                'class' => 'success',
                'message' => __('Update Successfully')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'type' => __('Error') . ' !',
                'class' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function currencyChange($id,UserInterface $user): \Illuminate\Http\RedirectResponse
    {
        try {
//            if(authId() != 1){
//                $userCurrency = [
//                    'id' => 'default_currency',
//                    'status' => $id,
//                    'user_id' => authId(),
//                ];
//                if ($user->currencyUpdate($userCurrency)) {
//                    Toastr::success(__('Updated Successfully'), __('Success'));
//                } else {
//                    Toastr::error(__('Something went wrong, please try again'), __('Error'));
//                }
//            }else{
                $data = [
                    'id' => 'default_currency',
                    'status' => $id,
                ];
                if ($this->settings->statusChange($data)) {
                    Toastr::success(__('Updated Successfully'), __('Success'));
                } else {
                    Toastr::error(__('Something went wrong, please try again'), __('Error'));
                }
//            }

            return back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), __('Error'));
            return back();
        }
    }
    public function langChange($id,UserInterface $user): \Illuminate\Http\RedirectResponse
    {
        try {
                $userLang = [
                    'lang_id' => $id,
                    'user_id' => authId(),
                ];
                if ($user->langUpdate($userLang)) {
                    Toastr::success(__('Updated Successfully'), __('Success'));
                } else {
                    Toastr::error(__('Something went wrong, please try again'), __('Error'));
                }

            return back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), __('Error'));
            return back();
        }
    }

    public function getTomeZoneByAjax(Request $request)
    {
        $term           = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }

        $timezones = $this->settings->allTimezones()
            ->where('timezone', 'like', '%'.$term.'%')
            ->limit(20)
            ->get();

        $formatted_user   = [];

        foreach ($timezones as $timezone) {
            $formatted_user[] = ['id' =>$timezone->timezone, 'text' => $timezone->gmt_offset > 0 ? "(UTC +$timezone->gmt_offset)".' '.$timezone->timezone : $timezone->gmt_offset];
        }

        return \Response::json($formatted_user);
    }
}
