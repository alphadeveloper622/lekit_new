<?php
namespace App\Repositories\Admin\Order;

use App\Models\PickupHub;
use App\Models\PickupHubLanguage;
use App\Models\SupportDepartmentLanguages;
use App\Repositories\Interfaces\Admin\Order\PickupHubInterface;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PickupHubRepository implements PickupHubInterface {

    public function store($request)
    {
             $pickup                    = new PickupHub();
             $pickup->phone             = $request->phone;
             $pickup->user_id           = $request->user_id;
             $pickup->save();

             $incharge                  = $pickup->incharge;
             $incharge->pickup_hub_id   = $pickup->id;
             $incharge->save();

             $request['pickup_hub_id'] = $pickup->id;
             if ($request->lang == ''):
                 $request['lang']    = 'en';
             endif;
             $this->langStore($request);
             return true;
    }

    public function langStore($request){

        $lang                       = new PickupHubLanguage();
        $lang->name                 = $request->name;
        $lang->address              = $request->address;
        $lang->pickup_hub_id        = $request->pickup_hub_id;
        $lang->lang                 = $request->lang;
        return $lang->save();


    }
    public function get($id){
        return PickupHub::find($id);
    }

    public function all()
    {
        return PickupHub::with('incharge')->latest();
    }

    public function getByLang($id, $lang)
    {
        if($lang == null):

            $pickupHubByLang = PickupHubLanguage::with('pickupHub')->where('lang', 'en')->where('pickup_hub_id', $id)->first();
        else:
            $pickupHubByLang = PickupHubLanguage::with('pickupHub')->where('lang', $lang)->where('pickup_hub_id', $id)->first();

            if (blank($pickupHubByLang)):
                $pickupHubByLang = PickupHubLanguage::with('pickupHub')->where('lang', 'en')->where('pickup_hub_id', $id)->first();
                $pickupHubByLang['translation_null'] = 'not-found';
            endif;
        endif;
        return $pickupHubByLang;
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function update($request)
    {
            $pickup                    = $this->get($request->pickup_hub_id);
            $pickup->phone             = $request->phone;
            $pickup->user_id           = $request->user_id;
            $pickup->save();

            $incharge                  = $pickup->incharge;
            $incharge->pickup_hub_id   = $pickup->id;
            $incharge->save();

            if ($request->pickup_hub_lang_id == '') :
                $this->langStore($request);
            else:
                $this->langUpdate($request);
            endif;
            return true;
    }

    public function langUpdate($request){

        $lang                       = PickupHubLanguage::find($request->pickup_hub_lang_id);
        $lang->name                 = $request->name;
        $lang->address              = $request->address;
        $lang->pickup_hub_id        = $request->pickup_hub_id;
        $lang->lang                 = $request->lang;
        return $lang->save();


    }

    public function statusChange($request)
    {
            $status           = $this->get($request['id']);
            $status->pick_up_status   = $request['status'];
            $status->save();
            return true;
    }

    public function activeHubs()
    {
        return PickupHub::where('pick_up_status',1)->get();
    }
}
