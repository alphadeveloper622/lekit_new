<?php

namespace App\Repositories\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Repositories\Interfaces\Admin\ShippingInterface;

class ShippingRepository implements ShippingInterface
{
    public function countries()
    {
        return Country::orderBy('name');
    }
    public function getAllCountries()
    {
        return Country::with('flag')->where('status',1)->get();
    }

    public function userCountries()
    {
        return Country::where('status',1)->selectRaw('name,id')->orderBy('name')->get();
    }

    public function countriesPaginate($request, $limit)
    {
        return $this->countries()
            ->when($request->q != null, function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->q.'%');
                $query->orwhere('iso3', 'like', '%'.$request->q.'%');
            })
            ->paginate($limit);
    }
    public function countryStatusChange($request)
    {
            $country            = Country::find($request['id']);
            $country->status    = $request['status'];
            $country->save();
            return true;
    }

    //state
    public function states()
    {
        return State::with('country')->orderBy('name');
    }
    public function getStateByCountry($id)
    {
        return State::where('status',1)->where('country_id',$id)->orderBy('name')->get();
    }
    public function getState($id)
    {
        return State::with('country')->find($id);
    }
    public function statesPaginate($request ,$limit)
    {
        return $this->states()
            ->when($request->a != null, function ($query) use ($request){
                $query->where('country_id',$request->a);
            })
            ->when($request->q != null, function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->q.'%');
            })
            ->paginate($limit);
    }
    public function stateStatusChange($request)
    {
            $state            = State::find($request['id']);
            $state->status    = $request['status'];
            $state->save();
            return true;
    }
    public function stateStore($request)
    {
            $state              = new State();
            $state->name        = $request->name;
            $state->country_id  = $request->country_id;
            $state->save();
            return true;
    }
    public function stateUpdate($request)
    {
            $state              = State::find($request->id);
            $state->name        = $request->name;
            $state->country_id  = $request->country_id;
            $state->save();
            return true;
    }

    //city
    public function cities()
    {
        return City::with('country','state')->orderBy('name');
    }
    public function getCity($id)
    {
        return City::with('country','state')->orderBy('name')->find($id);
    }

    public function getCitiesByState($id)
    {
        return City::where('status',1)->where('state_id',$id)->orderBy('name')->get();
    }

    public function citiesPaginate($request, $limit)
    {
        return $this->cities()
            ->when($request->a != null, function ($query) use ($request){
                $query->where('state_id',$request->a);
            })
            ->when($request->q != null, function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->q.'%');
            })
            ->paginate($limit);
    }
    public function cityStatusChange($request)
    {
            $country            = City::find($request['id']);
            $country->status    = $request['status'];
            $country->save();
            return true;
    }

    public function cityStore($request)
    {
            $state             = State::find($request->state_id);
            $city              = new City();
            $city->name        = $request->name;
            $city->state_id    = $request->state_id;
            $city->country_id  = $state->country_id;
            $city->cost        = priceFormatUpdate($request->cost,settingHelper('default_currency'));
            $city->save();
            return true;
    }
    public function cityUpdate($request)
    {
            $state             = State::find($request->state_id);
            $city              = City::find($request->id);
            $city->name        = $request->name;
            $city->state_id    = $request->state_id;
            $city->country_id  = $state->country_id;
            $city->cost        = priceFormatUpdate($request->cost,settingHelper('default_currency'));
            $city->save();
            return true;
    }

    public function countriesSearch($request)
    {
        return $this->countries()
            ->when($request->key != null, function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->key.'%');
                $query->orWhere('iso3', 'like', '%'.$request->key.'%');
            })->get();
    }

    public function stateImport()
    {
        State::truncate();
        $path   = base_path('public/sql/states.sql');
        $sql    = file_get_contents($path);
        \Illuminate\Support\Facades\DB::unprepared($sql);
        return true;
    }

}
