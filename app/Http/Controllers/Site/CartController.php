<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Admin\Marketing\CouponInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Site\CartInterface;
use App\Traits\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    use HomePage;

    protected $cart;
    protected $product;

    public function __construct(CartInterface $cart, ProductInterface $product)
    {
        $this->cart = $cart;
        $this->product = $product;
    }

    protected function carts($only_session=true): array
    {
        if(session()->get('is_buy_now') == 1 && $only_session) {
            $carts = $this->cart->all()->where('is_buy_now',session()->get('is_buy_now'));
        }else{
            $carts = $this->cart->all()->where('is_buy_now',0);
        }

        return [
            'carts'     => $this->cartList($carts),
            'checkouts' => count($carts) > 0 ? $this->cart->checkoutCoupon($carts, ['coupon'],authUser()) : [],
            'coupons'   => count($carts) > 0 && settingHelper('coupon_system') == 1 ? $this->cart->appliedCoupons(['trx_id' => $carts->first()->trx_id]) : [],
        ];
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if ($request->cart_page == 1) {
                session()->forget('is_buy_now');
            }
            return response()->json($this->carts());
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function addToCart(Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $product = $this->product->get($request->id);

            if (!$product->is_digital && ($product->minimum_order_quantity > $request->quantity)):
                return response()->json([
                    'error' => __('Please order minimum of :quantity products', ['quantity' => $product->minimum_order_quantity])
                ]);
            endif;

            $response = $this->cart->addToCart($request, $product,authUser());

            DB::commit();

            if (is_string($response) && $response == 'out_of_stock')
                return response()->json([
                    'error' => __('Product is out of stock')
                ]);
            else {
                $data = $this->carts(false);
                $data['success'] =__('Successfully added to cart');

                return response()->json($data);
            }


        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateCart(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $response = $this->cart->updateCart($request);

            if (is_string($response) && $response == 'out_of_stock') {
                $data = [
                    'error' => __('Product is out of stock')
                ];
                return response()->json($data);
            } else {
                $data = $this->carts();
                $data['success'] = __('Cart Updated');
            }
            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function removeFromCart($id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->cart->removeFromCart($id);

            $data = $this->carts('');
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function applyCoupon(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $coupon_apply = $this->cart->applyCoupon($request->all(),authUser());
            if (is_string($coupon_apply)) {
                $data = [
                    'error' => $coupon_apply
                ];
            } else {
                $data = $this->carts(session()->get('is_buy_now') == 1);
                $data['success'] = 'coupon applied';
            }
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' =>$e->getMessage()]);
        }
    }

    public function deleteCoupon(Request $request,CouponInterface $coupon): \Illuminate\Http\JsonResponse
    {
        try {
            $coupon->deleteCoupon($request);

            $data = $this->carts('');

            $data['success'] = __('coupon_removed_successfully');

            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function shippingCostFind(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $carts = $this->cart->all();
            $response = [
                'shipping_cost' => $this->cart->shippingCostFind($carts, $request->all())
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
