<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MiscRequest;
use App\Http\Requests\Admin\Setup\WhiteLevelRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\SettingInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelSettingController extends Controller
{
    private $settings;
    private $languages;


    public function __construct(SettingInterface $settings,LanguageInterface $languages)
    {
        $this->settings     = $settings;
        $this->languages    = $languages;

    }

    public function index(Request $request){
        $languages = $this->languages->all()->orderBy('id', 'asc')->get();
        $lang = $request->lang == '' ? \App::getLocale() : $request->lang;
        return view('admin.system-setup.admin-panel-setting',compact('languages', 'lang'));
    }
    public function update(Request $request){
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
}
