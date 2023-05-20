<?php

namespace App\Http\Controllers\Api\Seller\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seller\OrderDetailsResource;
use App\Http\Resources\Api\Seller\OrderListResource;
use App\Http\Resources\Api\Seller\OrderResource;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\OrderInterface;
use App\Traits\ApiReturnFormatTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    use ApiReturnFormatTrait;

    protected $order;
    protected $lang;

    public function __construct(OrderInterface $order, LanguageInterface $lang)
    {
        $this->order = $order;
        $this->lang = $lang;
    }

    public function orders(Request $request)
    {
        $user = null;
        if ($request->bearerToken()) {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            } catch (\Exception $e) {
                return $this->responseWithError(__('unauthorized_user'), [], 401);
            }
        }
        try {
            $orders = OrderResource::collection($this->order->apiSellerOrder($user, [
                'paginate' => get_pagination('api_paginate'),
                'status' => $request->delivery_status,
            ]));
            return $this->responseWithSuccess(__('Order Fetched Successfully'), $orders, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function orderDetails(Request $request, $id)
    {
        try{
            $user = null;
            if ($request->bearerToken()) {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                    return $this->responseWithError(__('unauthorized_user'), [], 401);
                }
            }
            $order = $this->order->get($id);
            if (!$order) {
                return $this->responseWithError(__('Order Not Found'), [], 404);
            }
            if ($user->id != $order->seller_id)
            {
                return $this->responseWithError(__('Order Not Found'), [], 404);
            }
            $order_details = [];
            foreach ($order->orderDetails as $orderDetail) {
                $order_details[] = [
                    'id'            => $orderDetail->id,
                    'product_name'  => @$orderDetail->product->product_name,
                    'quantity'      => $orderDetail->quantity,
                    'price'         => number_format($orderDetail->price,3,'.',''),
                    'total_price'   => number_format($orderDetail->price * $orderDetail->quantity,3,'.',''),
                ];
            }

            $tracking_no = 1;

            if ($order->delivery_status == 'confirm')
            {
                $tracking_no = 2;
            }
            if ($order->delivery_status == 'picked_up' || $order->delivery_status == 'on_the_way')
            {
                $tracking_no = 3;
            }
            if ($order->delivery_status == 'delivered')
            {
                $tracking_no = 4;
            }

            $data = [
                'id'                    => $order->id,
                'code'                  => $order->code,
                'customer_name'         => $order->user->full_name,
                'customer_phone'        => nullCheck($order->user->phone),
                'shipping_address'      => arrayCheck('address',$order->shipping_address) ? $order->shipping_address['address'] : '',
                'billing_address'       => arrayCheck('address',$order->billing_address) ? $order->billing_address['address'] : '',
                'payment_method'        => $order->payment_type,
                'total_amount'          => number_format($order->total_payable,3,'.',''),
                'order_tracking_status' => $tracking_no,
                'products'              => $order_details,
                'calculations'          => [
                    'sub_total'         => number_format($order->sub_total,3,'.',''),
                    'discount'          => number_format($order->discount,3,'.',''),
                    'coupon_discount'   => number_format($order->coupon_discount,3,'.',''),
                    'tax'               => number_format($order->total_tax,3,'.',''),
                    'shipping_cost'     => number_format($order->shipping_cost,3,'.',''),
                    'total_payable'     => number_format($order->total_payable,3,'.',''),
                ],
            ];
            return $this->responseWithSuccess(__('Order Details Fetched Successfully'), $data);
        }catch (\Exception $e){
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function invoiceDownload(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $user = null;
            if ($request->bearerToken()) {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return $this->responseWithError(__('unauthorized_user'), [], 401);
                    }
                } catch (\Exception $e) {
                }
            }
            return $this->order->invoiceDownloadApi($id);

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function cancelOrder(Request $request,$id): \Illuminate\Http\JsonResponse
    {
        try {
            $order_find = $this->order->get($id);
                $data = [
                    'orders' => $this->order->cancelOrder($order_find, $request->remarks),
                ];
            return response()->json([
                'success'   => true,
                'message'   => 'Order canceled Successfully',
            ],200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function deliveredOrder(Request $request)
    {
        try{
            $order = $this->order->get($request['id']);
            if ($order->delivery_status != 'delivered'):
                if ($order->delivery_status == $request['delivery_status']):
                    return $this->responseWithSuccess(__('Delivery status has been already updated to :status'), '', 200);
                else:
                    if (($order->payment_status == 'unpaid' || $order->payment_status == 'refunded_to_wallet')  && $request['delivery_status'] == 'delivered'):
                        return response()->json([
                            'success'   => false,
                            'message'   => 'Unpaid order can not get delivered',
                        ],401);
                    else:
                        $status = $this->order->deliveryStatusChange($request);
                        if ($status === 'product_not_available'):
                            return response()->json([
                                'success'   => false,
                                'message'   => 'Product stock not available',
                            ],200);
                        elseif ($status):
                            return response()->json([
                                'success'   => true,
                                'message'   => 'Update Successfully',
                            ],200);
                        else:
                            return response()->json([
                                'success'   => false,
                                'message'   => 'Something went wrong, please try again',
                            ],200);
                        endif;
                    endif;
                endif;
            else:
                return response()->json([
                    'success'   => false,
                    'message'   => 'Delivered order can not get updated',
                ],null);
            endif;
        }catch (\Exception $e) {
            return $this->responseWithError($e->getMessage() [], null);
        }
    }
}
