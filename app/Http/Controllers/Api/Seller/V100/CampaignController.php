<?php

namespace App\Http\Controllers\Api\Seller\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seller\CampaignProductResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SiteResource\CampaignResource;
use App\Repositories\Interfaces\Admin\Marketing\CampaignInterface;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CampaignController extends Controller
{
    use ApiReturnFormatTrait;

    protected $campaign;

    public function __construct(CampaignInterface $campaign)
    {
        $this->campaign = $campaign;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try{
            $campaigns  = CampaignResource::collection($this->campaign->paginate(get_pagination('pagination')));

            return $this->responseWithSuccess('Campaigns Fetched Successfully', $campaigns, 200);
        }catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function products($id,Request $request): \Illuminate\Http\JsonResponse
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
            $campaign = $this->campaign->get($id);

            if (!$campaign)
            {
                return $this->responseWithError(__('Campaign not found'), [], 404);
            }
            $data = [
                'products' => new CampaignProductResource($this->campaign->sellerCampaignProducts($id, $user->id)),
                'campaign' => [
                    'id' => $id,
                    'banner' => $campaign->image_1920x412
                ]
            ];

            return $this->responseWithSuccess('Campaigns Product Fetched Successfully', $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function removeProducts(Request $request): \Illuminate\Http\JsonResponse
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

        $validator = Validator::make($request->all(), [
            'campaign_id'   => 'required',
            'product_id'    => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseWithError(__('Required field missing'), $validator->errors(), 422);
        }

        try {
            $data = [
                'campaign_id' => $request->campaign_id,
                'product_id' => $request->product_id,
                'user_id' => $user->id
            ];
            $this->campaign->removeProduct($data);
            return $this->responseWithSuccess('Campaigns Product Removed Successfully', [], 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function requestProducts(Request $request): \Illuminate\Http\JsonResponse
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

        $validator = Validator::make($request->all(), [
            'product_id'    => 'required',
            'campaign_id'   => 'required|exists:campaigns,id',
            'discount'      => 'required',
            'discount_type' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseWithError(__('Required field missing'), $validator->errors(), 422);
        }

        try {
            $data = $request->all();
            $data['user_id'] = $user->id;

            $campaign = $this->campaign->storeProducts($data);

            if (!$campaign)
            {
                return $this->responseWithError(__('Product Not Found'), [], 500);
            }

            return $this->responseWithSuccess('Products Added to Campaign Successfully', [], 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }
}
