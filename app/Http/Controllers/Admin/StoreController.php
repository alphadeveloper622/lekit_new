<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\SiteResource\CouponPaginateResource;
use App\Http\Resources\SiteResource\ProductPaginateResource;
use App\Http\Resources\SiteResource\ProductResource;
use App\Imports\SellerImport;
use App\Repositories\Interfaces\Admin\Marketing\CouponInterface;
use App\Repositories\Interfaces\Admin\MediaInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Admin\StoreProfileInterface;
use App\Repositories\Interfaces\Admin\StoreInterface;
use App\Repositories\Interfaces\Admin\StoreCategoryInterface;
use App\Traits\HomePage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    use HomePage;

    protected $stores;
    protected $storeProfile;
    public function __construct(StoreInterface $stores,StoreCategoryInterface $categories,StoreProfileInterface $storeProfile)
    {
        if(settingHelper('seller_system') != 1){
            abort(403);
        }
        $this->stores = $stores;
        $this->categories       = $categories;
        $this->storeProfile=$storeProfile;
    }

    public function index(Request $request)
    {
        try{
            $stores = $this->stores->paginate($request, get_pagination('pagination'));
            return view('admin.stores.index', compact('stores'));
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }

    }
    public function create()
    {
        $data = [
            'categories'    => $this->categories->allCategory()->where('parent_id', null)->where('status',1),
            'currency_list' => currencyList(),
            'sellers' => $this->stores->allSeller()->get(),
            'selected_category' => null
        ];

        return view('admin.stores.form', $data);
    }

    public function store(UserStoreRequest $request)
    {
        $this->validate($request, [
            'seller_id' => 'required',
            'store_name' => 'required|unique:stores',
            'store_code' => 'required|unique:stores',
            'address' => 'required',
            'store_phone' => 'required',
            'store_email' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'store_description' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $this->stores->store($request);
            cache()->forget('exchange_rate');
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->route('stores')->with('success', __('Data added Successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $user = $this->stores->get($id);
            if ($user) {
                $data = [
                    'categories'    => $this->categories->allCategory()->where('parent_id', null)->where('status',1),
                    'currency_list' => currencyList(),
                    'r' => $request->r != '' ? $request->r : $request->server('HTTP_REFERER'),
                    'user' => $user,
                    'sellers' => $this->stores->allSeller()->get(),
                    'selected_category'  => $this->storeProfile->getStoresCategory($id),
                ];
            } else {
                Toastr::error(__('Not found'));
                return back();
            }
            return view('admin.stores.form', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function update(UserUpdateRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        $this->validate($request, [
            'seller_id' => 'required',
            'store_name' => 'required',
            'store_code' => 'required',
            'address' => 'required',
            'store_phone' => 'required',
            'store_email' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'store_description' => 'required'
        ]);
        
        DB::beginTransaction();
        try {
            $this->stores->update($request);
            cache()->forget('exchange_rate');
            Toastr::success(__('Data Updated Successfully'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    /*public function verify($id, $user_id){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        if($id == 0):
            Toastr::error(__('Please complete your shop details.'));
            return redirect()->route('admin.seller.edit',$user_id);
        endif;
        DB::beginTransaction();
        try {
            $this->sellers->verify($id);
            Toastr::success(__('Data Updated Successfully'));
            DB::commit();
            return redirect()->route('sellers');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function sellerByAjax(Request $request){
        $term           = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }

        $sellers = $this->sellers->shop()
            ->where('shop_name', 'like', '%'.$term.'%')
            ->where('verified_at','!=',null)
            ->limit(30)
            ->get();

        $formatted_seller   = [];

        foreach ($sellers as $seller) {
            $formatted_seller[] = ['id' => $seller->id, 'text' => $seller->shop_name];
        }

        return \Response::json($formatted_seller);
    }

    public function shop(SellerProfileInterface $seller,MediaInterface $media,ProductInterface $product,CouponInterface $coupon, $slug): \Illuminate\Http\JsonResponse
    {
        try {
            $shop = $seller->shopDetails($slug);

            $contents = $shop->shop_page_contents;

            $data = [
                'shop' => [
                    'id'                    => $shop->id,
                    'slug'                  => $slug,
                    'contents'              => $this->parseShopData($shop,$media,$product),
                    'component_names'       => $contents ? array_keys(array_merge(...$contents)) : [],
                    'image_82x82'           => $shop->image_82x82,
                    'image_899x480'         => $shop->image_899x480,
                    'shop_name'             => $shop->shop_name,
                    'shop_page_contents'    => $shop->shop_page_contents,
                    'rating_count'          => round($shop->rating_count,2),
                    'reviews_count'         => (int)$shop->reviews_count,
                    'shop_tagline'          => $shop->shop_tagline,
                    'image_297x203'         => $shop->image_297x203,
                    'total_products'        => count($shop->products),
                    'join_date'             => Carbon::parse($shop->created_at)->format('d M Y'),
                ],
                'coupons' => new CouponPaginateResource($coupon->sellerCoupons($shop->user_id)),
                'products' => new ProductPaginateResource($product->sellerProducts($shop->user_id)),
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function sellerImport(Request $request)
    {
        return view('admin.sellers.import-seller');
    }

    public function importSeller(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);
        $extension = request()->file('file')->getClientOriginalExtension();

        if ($extension != 'xlsx' && $extension != 'xls' && $extension != 'csv'):
            return back()->with('danger', __('file_type_not_supported'));
        endif;

        $file = request()->file('file')->store('import');
        $import = new SellerImport();
        $import->import($file);

        unlink(storage_path('app/'.$file));
        Toastr::success(__('successfully_imported'));
        return back();
    }*/
}
