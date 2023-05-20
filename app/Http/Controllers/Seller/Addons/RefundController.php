<?php

namespace App\Http\Controllers\Seller\Addons;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Admin\Refund\RefundInterface;
use App\Repositories\Interfaces\Admin\SellerInterface;
use App\Repositories\Interfaces\Admin\SellerPayoutInterface;
use App\Repositories\Interfaces\Admin\SettingInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    protected $settings;
    protected $refunds;
    protected $sellers;
    protected $payouts;

    public function __construct(SettingInterface $settings, RefundInterface $refunds, SellerInterface $sellers, SellerPayoutInterface $payouts)
    {
        $this->settings = $settings;
        $this->refunds = $refunds;
        $this->sellers = $sellers;
        $this->payouts = $payouts;
    }

    public function refund(Request $request)
    {
        $refunds = $this->refunds->paginate($request, get_pagination('pagination'), '');
        return view('seller.refunds.index', compact('refunds'));
    }

    public function approvedRefund($id)
    {
        $refund = $this->refunds->get($id);
        if ($refund->seller_approval == 'approved' || $refund->seller_approval == 'rejected'):
            $response['message'] = __('Already :status', ['status' => $refund->status]);
            $response['status']  = 'error';
            $response['title']   = __('Ops..!');
            return response()->json($response);
        elseif ($refund->status == 'rejected'):
            $response['message'] = __('Already rejected');
            $response['status']  = 'error';
            $response['title']   = __('Ops..!');
            return response()->json($response);
        else:
            if ($this->refunds->approvedRefund($id)):
                $response['message'] = __('Approved Successfully');
                $response['status']  = 'success';
                $response['title']   = __('Success');
                return response()->json($response);
            else:
                $response['message'] = __('Something went wrong, please try again');
                $response['status']  = 'error';
                $response['title']   = __('Ops..!');
                return response()->json($response);
            endif;
        endif;

    }
    public function allApprovedRefund(Request $request){
        $refunds = $this->refunds->paginate($request,get_pagination('pagination'),'approved');
        return view('seller.refunds.approved-refund',compact('refunds'));
    }
    public function allProcessedRefund(Request $request){
        $refunds = $this->refunds->paginate($request,get_pagination('pagination'),'processed');
        return view('seller.refunds.processed-refund',compact('refunds'));
    }
    public function rejectRefund(Request $request){
        if ($this->refunds->rejectRefund($request)):
            Toastr::success(__('Refund Rejected Successfully'));
            return redirect()->back();
        else:
            Toastr::error(__('Refund is not reject'));
            return back()->withInput();
        endif;
    }
    public function allRejectedRefund(Request $request){
        $refunds = $this->refunds->paginate($request,get_pagination('pagination'),'rejected');
        return view('seller.refunds.rejected-refund',compact('refunds'));
    }
}
