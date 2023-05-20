<?php

namespace App\Http\Controllers\Site\Addons;

use App\Http\Controllers\Controller;
use App\Http\Requests\Addon\RefundRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\Interfaces\Admin\OrderInterface;
use App\Repositories\Interfaces\Admin\Refund\RefundInterface;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Sentinel;

class RefundController extends Controller
{
    protected $refund;
    protected $order;

    public function __construct(RefundInterface $refund, OrderInterface $order)
    {
        $this->refund = $refund;
        $this->order  = $order;
    }

    public function store(RefundRequest $request)
    {
        DB::beginTransaction();
        try {
            $order_detail = $this->order->getDetail($request->order_detail_id);
            if ($order_detail):
                if (blank($order_detail->refund)):
                    $days = Carbon::parse($order_detail->order->deliveredAt->created_at)->diffInDays();
                    if ($order_detail->order->user_id == Sentinel::getUser()->id):
                        if ($order_detail->is_refundable && settingHelper('refund_request_time') > $days):
                            $this->refund->store($request);
                            DB::commit();
                            $response = [
                                'success'        => __('Request send successfully, wait for the approval'),
                                'order_detail'   => OrderDetail::with('product:id,thumbnail','refund')->find($order_detail->id),
                            ];
                        else:
                            $response = [
                                'error'         => __('Product is not refundable'),
                                'order_detail'  => OrderDetail::with('product:id,thumbnail','refund')->find($order_detail->id),
                            ];
                        endif;
                    else:
                        $response = [
                            'error' => __('Order not found'),
                        ];
                    endif;
                else:
                    $response = [
                        'error'         => __('Refund request already exists'),
                        'order_detail'  => OrderDetail::with('product:id,thumbnail','refund')->find($order_detail->id),
                    ];
                endif;
            else:
                $response = [
                    'error' => __('Order not found')
                ];
            endif;
            return response()->json($response);
        } catch (\Exception $e){
            DB::rollBack();
            return response()->json([
               'error' => __('Oops...Something Went Wrong')
            ]);
        }
    }
}
