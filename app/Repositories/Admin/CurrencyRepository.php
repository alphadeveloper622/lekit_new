<?php

namespace App\Repositories\Admin;

use App\Models\Currency;
use App\Repositories\Interfaces\Admin\CurrencyInterface;
use DB;
use Illuminate\Support\Facades\Cache;

class CurrencyRepository implements CurrencyInterface
{
    public function all()
    {
        return Currency::latest();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function get($id)
    {
        return Currency::find($id);
    }

    public function store($request)
    {
       $currency                    = new Currency();
       $currency->name              = $request->name;
       $currency->symbol            = $request->symbol;
       $currency->code              = $request->code;
       $currency->exchange_rate     = $request->exchange_rate;

       $currency->save();
       Cache::forget('currencies');
       return true;
    }

    public function update($request)
    {
        $currency = $this->get($request->id);

        $currency->name              = $request->name;
        $currency->symbol            = $request->symbol;
        $currency->code              = $request->code;
        $currency->exchange_rate     = $request->exchange_rate;
        $currency->save();

        Cache::forget('currencies');
        return true;
    }

    public function statusChange($request)
    {
        $currency           = $this->get($request['id']);
        if($currency->id != settingHelper('default_currency') ):
            $currency->status   = $request['status'];
            $currency->save();

            DB::commit();
            Cache::forget('currencies');
            return true;
        else:
            return false;
        endif;
    }

    //for APi
    public function activeCurrency()
    {
        return Currency::where('status',1)->get();
    }

    public function currencyByCode($code)
    {
        return Currency::where('code',$code)->first();
    }

}
