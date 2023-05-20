<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\User;
use App\Repositories\Interfaces\Admin\Order\PickupHubInterface;
use App\Repositories\Interfaces\Admin\ShippingInterface;
use App\Repositories\Interfaces\Site\AddressInterface;
use App\Repositories\Interfaces\Site\CartInterface;
use App\Traits\HomePage;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use HomePage;

    public function addresses(Request $request,CartInterface $cart, PickupHubInterface $pickupHub): \Illuminate\Http\JsonResponse
    {
        try {
            if ($request->cart_page == 1) {
                session()->forget('is_buy_now');
            }
            if(session()->get('is_buy_now') == 1) {
                $carts = $cart->all()->where('is_buy_now',session()->get('is_buy_now'));
            }else{
                $carts = $cart->all()->where('is_buy_now',0);
            }

            $data = [
                'addresses'     => authUser() ? authUser()->addresses : (session()->has('addresses') ? session()->get('addresses') : []),
                'carts'         => $this->cartList($carts),
                'checkouts'     => count($carts) > 0 ? $cart->checkoutCoupon($carts,['coupon'],authUser()) : [],
                'coupons'       => count($carts) > 0 && settingHelper('coupon_system') == 1 ? $cart->appliedCoupons(['trx_id' => $carts->first()->trx_id]) : [],
                'pickup_hubs'   => authUser() && settingHelper('pickup_point') == 1 ? $pickupHub->activeHubs() : []
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function allAddress(ShippingInterface $shipping): \Illuminate\Http\JsonResponse
    {
        try {
            $data = [
                'addresses' => authUser()->addresses,
                'countries' => $shipping->getAllCountries(),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function countries(ShippingInterface $shipping): \Illuminate\Http\JsonResponse
    {
        try {
            $data = [
                'countries' => CountryResource::collection($shipping->getAllCountries()),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getStates($id, ShippingInterface $shipping): \Illuminate\Http\JsonResponse
    {
        try {
            $data = [
                'states' => $shipping->getStateByCountry($id),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getCities($id, ShippingInterface $shipping): \Illuminate\Http\JsonResponse
    {
        try {
            $data = [
                'cities' => $shipping->getCitiesByState($id),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function saveAddress(Request $request, AddressInterface $address): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'nullable',
            'postal_code' => 'required',
            'address' => 'required',
        ]);
        try {
            $address->storeAddress($request->all());
            $data = [
                'address' => 'Address Added',
                'success' => __('Address Created Successfully'),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateDefault($type, $id, AddressInterface $address): \Illuminate\Http\JsonResponse
    {
        try {
            $address->makeDefault($type, $id);

            $data = [
                'user' => User::find(authId()),
                'success' => __('Updated Successfully'),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteAddress($id, AddressInterface $address): \Illuminate\Http\JsonResponse
    {
        if (isDemoServer()):
            $data = [
                'error' => __('This function is disabled in demo server.')
            ];
            return response()->json($data);
        endif;
        try {
            $data = [
                'address' => $address->deleteAddress($id),
                'success' => __('Address Deleted Successfully'),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function searchCountry(Request $request, ShippingInterface $shipping)
    {
        try {
            $countries = $shipping->countriesSearch($request);
            return response()->json([
                'countries' => $countries
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
