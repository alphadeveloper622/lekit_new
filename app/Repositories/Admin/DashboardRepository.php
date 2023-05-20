<?php

namespace App\Repositories\Admin;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Repositories\Interfaces\Admin\DashboardInterface;
use App\Repositories\Interfaces\Admin\OrderInterface;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Admin\Refund\RefundInterface;
use App\Repositories\Interfaces\Admin\SellerInterface;
use App\Repositories\Interfaces\Admin\Support\SupportInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Utility\AppSettingUtility;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardInterface
{
    protected $order;
    protected $product;
    protected $user;
    protected $brand;
    protected $seller;
    protected $category;
    protected $support;
    protected $refund;

    public function __construct(
        OrderInterface $order,
        ProductInterface $product,
        UserInterface $user,
        BrandInterface $brand,
        SellerInterface $seller,
        CategoryInterface $category,
        SupportInterface $support,
        RefundInterface $refund
    )
    {
        $this->order        = $order;
        $this->product      = $product;
        $this->user         = $user;
        $this->brand        = $brand;
        $this->seller       = $seller;
        $this->category     = $category;
        $this->support      = $support;
        $this->refund       = $refund;
    }

    public function index(): array
    {
        $total_order_amount             = $this->order->all()->where('delivery_status', 'delivered')
                                                            ->when(settingHelper('seller_system') != 1,function ($q){
                                                                $q->where('seller_id', 1);
                                                            })
                                                            ->when(authUser()->user_type == 'seller',function ($q){
                                                                $q->where('seller_id',authId());
                                                            })
                                                            ->sum('total_payable');
        if(addon_is_activated('refund')):
            $total_refund                   = $this->refund->all()
                ->when(settingHelper('seller_system') != 1,function ($q){
                    $q->where('seller_id', 1);
                })
                ->when(authUser()->user_type == 'seller',function ($q){
                    $q->where('seller_id',authId());
                })->where('status','processed')->sum('refund_amount');
        else:
            $total_refund = 0;
        endif;
        $order_state                    = $this->orderState('this_year', true);
        $sales_state                    = $this->salesState('this_year', true);

        $sales_by_categories            = $this->salesByCategory('today',true);

        $top_products                   = $this->topProducts('this_week', true);
        $orders                         = $this->order->all()->withCount('orderDetails')
                                            ->when(settingHelper('seller_system') != 1,function ($q){
                                                $q->where('seller_id', 1);
                                            })->when(authUser()->user_type == 'seller',function ($q){
                                                $q->where('seller_id',authId());
                                            })->take(5)->get();

        if (authUser()->user_type != 'seller'):
            $data[] = [
                'top_categories'                 => $this->topCategories(),
                'top_brands'                     => Product::with('brand')->whereHas('brand')->ProductPublished()->UserCheck()->IsWholesale()->IsStockOut()->groupBy('brand_id')->selectRaw('SUM(total_sale) as brand_total_sale,brand_id')
                    ->orderBy('brand_total_sale','desc')->take(5)->get(),
                'top_sellers'                    => $this->topSellers(),
                'total_brand'                    => $this->brand->all()->where('lang','en')->where('status',1)->count(),
            ];
           if (settingHelper('seller_system') == 1):
               $supports                            = $this->support->all()->where('status','pending');
               $data[] = [
                   'top_sellers'                    => $this->topSellers(),
                   'total_seller'                   => $this->seller->all()->count(),
                   'total_support'                  => $supports->count(),
                   'supports'                       => $supports->take(3)->get(),
               ];
           else:
               $data[] = [
                   'total_categories'              =>$this->category->all()->count(),
               ];
            endif;
        endif;
        $data[] = [
            'total_orders'              => $this->order->all()
                                                ->when(settingHelper('seller_system') != 1,function ($q){
                                                    $q->where('seller_id', 1);
                                                })
                                                ->when(authUser()->user_type == 'seller',function ($q){
                                                $q->where('seller_id',authId());
                                            })->count(),
            'total_sale'                => $total_order_amount - $total_refund,
            'total_product'             => $this->product->all()
                                                ->when(settingHelper('seller_system') != 1,function ($q){
                                                    $q->where('user_id', 1);
                                                })
                                                ->when(authUser()->user_type == 'seller',function ($q){
                                                $q->where('user_id',authId());
                                            })->count(),
            'total_customer'            => $this->user->all()->where('status',1)->where('is_user_banned',0)->count(),
            'order_statistics'          => $this->orderStatistics('today', true),
            'order_state'               => json_encode($order_state),
            'sales_by_category'         => [
                                             'categories' => json_encode($sales_by_categories['categories']),
                                              'sales'     => json_encode($sales_by_categories['sales']),
                                            ],
            'sales_state'               => json_encode($sales_state),
            'top_products'              => $top_products,
            'orders'                    => $orders,
        ];

        return array_merge(...$data);
    }

    public function getLastDateOfMonth($month)
    {
        $date = date('Y').'-'.$month.'-01';  //make date of month
        return date('t', strtotime($date));
    }

    public function orderState($report_type, $first_load)
    {
        $data = [];
        if ($report_type == 'this_year' || $report_type == 'last_year'):
            $start_month    = $report_type == 'this_year' ? date('Y-'.'01') :  date('Y-'.'01', strtotime('-1 year'));
            $end_month      = $report_type == 'this_year' ? date('Y-'.'12') : date('Y-'.'12',strtotime('-1 year'));

            $orders             = $this->order->all()
                                    ->when(settingHelper('seller_system') != 1,function ($q){
                                        $q->where('seller_id', 1);
                                    })
                                    ->when(authUser()->user_type == 'seller',function ($q){
                                        $q->where('seller_id',authId());
                                    })
                                    ->where('created_at', '>=', $start_month. ' 00:00:00')
                                    ->where('created_at', '<=', $end_month. ' 23:59:59')->get();

            for($i = 1; $i <= 12; $i++) {

                if ($i < 10) {
                    $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                }

                $created_at             = $report_type == 'this_year' ? date('Y-' . $i) : date('Y-'.$i,strtotime('-1 year'));

                $start                  = $created_at . '-01';
                $end                    = $created_at . '-' . $this->getLastDateOfMonth($i);
                $month_orders           = $orders->where('created_at', '>=', $start. ' 00:00:00')
                                            ->where('created_at', '<=', $end. ' 23:59:59')->count();
                array_push($data, $month_orders);
            }
            $response['labels'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
        elseif ($report_type == 'lifetime'):
            $start_year = date('Y', strtotime($this->order->all()->min('created_at')));
            $last_year = date('Y');

            if ($start_year - $last_year == 0):
                for($i = 1; $i <= 12; $i++) {

                    if ($i < 10) {
                        $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                    }

                    $created_at = date('Y-' . $i);

                    $start                  = $created_at . '-01';
                    $end                    = $created_at . '-' . $this->getLastDateOfMonth($i);
                    $orders                 = $this->order->all()
                                                ->when(settingHelper('seller_system') != 1,function ($q){
                                                    $q->where('seller_id', 1);
                                                })
                                                ->when(authUser()->user_type == 'seller',function ($q){
                                                    $q->where('seller_id',authId());
                                                })
                                                ->where('created_at', '>=', $start. ' 00:00:00')
                                                ->where('created_at', '<=', $end. ' 23:59:59')->count();
                    array_push($data, $orders);
                }
                $response['labels'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
            else:
                for($i = $start_year; $i <= $last_year ; $i++){
                    $start = $i.'-01-01';
                    $end   = $i.'-12-31';

                    $orders                 = $this->order->all()
                                                    ->when(settingHelper('seller_system') != 1,function ($q){
                                                        $q->where('seller_id', 1);
                                                    })
                                                    ->when(authUser()->user_type == 'seller',function ($q){
                                                    $q->where('seller_id',authId());
                                                })
                                                ->where('created_at', '>=', $start. ' 00:00:00')
                                                ->where('created_at', '<=', $end. ' 23:59:59')->count();
                    array_push($data, $orders);

                    $response['labels'][]         = $i;
                }
            endif;
        endif;


        if($first_load):
            return $data;
        else:
            $response['orders'] = $data;
            return response()->json($response);
        endif;
    }

    public function salesByCategory($report_type, $first_load)
    {
        $categories = $this->category->allCategory()->where('parent_id',null);
        $levels           = array();
        $sales            = array();

        foreach ($categories as $category) {
            $category_ids = \App\Utility\CategoryUtility::getMyChildIds($category->id);
            $category_ids[] = $category->id;
            $orders = OrderDetail::whereHas('product', function ($q) use ($category_ids){
                $q->whereIn('category_id', $category_ids);
            })->whereHas('order', function ($q){
                $q->where('delivery_status', 'delivered')
                    ->when(settingHelper('seller_system') != 1,function ($q){
                        $q->where('seller_id', 1);
                    })
                    ->when(authUser()->user_type == 'seller',function ($q){
                        $q->where('seller_id',authId());
                    });
            })->whereDoesntHave('refund',function ($q){
                $q->where('status','processed');
            });
            $now = Carbon::now();
            switch($report_type){
                case 'today' :
                    $today                          = date('Y-m-d');
                    $orders                         = $orders->where('created_at', '>=', $today. ' 00:00:00')
                        ->where('created_at', '<=', $today. ' 23:59:59')->get();
                    break;
                case 'yesterday':
                    $yesterday                      = date('Y-m-d', strtotime('-1 day'));
                    $orders                         = $orders->where('created_at', '>=', $yesterday. ' 00:00:00')
                        ->where('created_at', '<=', $yesterday. ' 23:59:59')->get();
                    break;
                case 'this_week':
                    $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY))). ' 00:00:00';
                    $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY))). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'last_week':
                    $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY).('-1 week'))). ' 00:00:00';
                    $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY).('-1 week'))). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'this_month':
                    $start_day                      = date('Y-m-'.'01'). ' 00:00:00';
                    $end_day                        = date('Y-m-t'). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'last_month':
                    $start_day                      = date('Y-m-d',strtotime("first day of -1 month")). ' 00:00:00';
                    $end_day                        = date('Y-m-d',strtotime("last day of -1 month")). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'last_3_month':
                    $start_day                      = date('Y-m', strtotime('-3 month')).'-01'.' 00:00:00';
                    $end_day                        = date('Y-m-d', strtotime('last day of -1 month')). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'last_6_month':
                    $start_day                      = date('Y-m', strtotime('-6 month')).'-01'.' 00:00:00';
                    $end_day                        = date('Y-m', strtotime('first day of -1 month')). ' 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'this_year':
                    $start_day                      = date('Y-'.'01-01 00:00:00');
                    $end_day                        = date('Y-'.'12 -31 23:59:59');

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;
                case 'last_year':
                    $start_day  = date('Y-'.'01', strtotime('-1 year')).'-01 00:00:00';
                    $end_day    = date('Y-'.'12',strtotime('-1 year')). '-31 23:59:59';

                    $orders                         = $orders->where('created_at', '>=', $start_day)
                        ->where('created_at', '<=', $end_day)->get();
                    break;

            }

            array_push($levels,$category->getTranslation('title', \App::getLocale()));
            array_push($sales, $orders->sum('quantity'));
        }

        $data['categories'] = $levels;
        $data['sales']      = $sales;

        if($first_load):
            return $data;
        else:
            return response()->json($data);
        endif;
    }

    public function salesState($report_type, $first_load)
    {
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        if ($report_type == 'this_year' || $report_type == 'last_year'):

            if ($report_type == 'this_year')
            {
                $date = [Carbon::now()->startOfYear()->format('Y-m-d'),Carbon::now()->lastOfYear()->format('Y-m-d')];
            }
            else{
                $date = [Carbon::now()->subYears(1)->startOfYear()->format('Y-m-d'),Carbon::now()->subYears(1)->lastOfYear()->format('Y-m-d')];
            }

            $orders                 = DB::table('orders')
                ->when(settingHelper('seller_system') != 1,function ($q){
                    $q->where('orders.seller_id', 1);
                })
                ->when(authUser()->user_type == 'seller',function ($q){
                    $q->where('orders.seller_id',authId());
                })->whereBetween('orders.created_at',  [$date[0]. ' 00:00:00',$date[1]. ' 23:59:59'])
                ->where('delivery_status', 'delivered')
                ->leftjoin('refunds','orders.id','refunds.order_id')->selectRaw('(SUM(total_payable) - ifnull(refund_amount, 0)) as amount,MONTH(orders.created_at) as month,Year(orders.created_at) as year')
                ->groupByRaw('MONTH(orders.created_at)')->get();

            foreach ($orders as $order) {
                $data[$order->month-1] = $this->formatPrice($order->amount);
            }

            $response['labels'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
        elseif ($report_type == 'lifetime'):
            $start_year = date('Y', strtotime($this->order->all()->min('created_at')));
            $last_year = date('Y');

            if ($start_year - $last_year == 0):
                for($i = 1; $i <= 12; $i++) {

                    if ($i < 10) {
                        $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                    }

                    $created_at = date('Y-' . $i);

                    $start                  = $created_at . '-01';
                    $end                    = $created_at . '-' . $this->getLastDateOfMonth($i);
                    $orders                 = $this->order->all()
                        ->when(settingHelper('seller_system') != 1,function ($q){
                            $q->where('seller_id', 1);
                        })
                        ->when(authUser()->user_type == 'seller',function ($q){
                            $q->where('seller_id',authId());
                        })
                        ->where('created_at', '>=', $start. ' 00:00:00')
                        ->where('created_at', '<=', $end. ' 23:59:59')->where('delivery_status', 'delivered')->withSum('processedRefunds', 'refund_amount')->get();

                    $all_orders             = $orders;
                    $refunded_amount         = $orders->sum('processed_refunds_sum_refund_amount');
                    $total_payable         = $all_orders->sum('total_payable');
                    $data[] = round($total_payable - $refunded_amount,(int)settingHelper('no_of_decimals'));
                }
                $response['labels'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
            else:
                for($i = $start_year; $i <= $last_year ; $i++){
                    $start = $i.'-01-01';
                    $end   = $i.'-12-31';

                    $orders                 = $this->order->all()
                        ->when(settingHelper('seller_system') != 1,function ($q){
                            $q->where('seller_id', 1);
                        })
                        ->when(authUser()->user_type == 'seller',function ($q){
                            $q->where('seller_id',authId());
                        })
                        ->where('created_at', '>=', $start. ' 00:00:00')
                        ->where('created_at', '<=', $end. ' 23:59:59')->where('delivery_status', 'delivered')->withSum('processedRefunds', 'refund_amount')->get();

                    $all_orders             = $orders;
                    $refunded_amount         = $orders->sum('processed_refunds_sum_refund_amount');
                    $total_payable         = $all_orders->sum('total_payable');
                    $data[] = round($total_payable - $refunded_amount,(int)settingHelper('no_of_decimals'));

                    $response['labels'][]         = $i;
                }
            endif;
        endif;

        if($first_load):
            return $data;
        else:
            $response['sales'] = $data;
            return response()->json($response);
        endif;
    }

    public function formatPrice($amount){
        $currencies = AppSettingUtility::currencies()->where('status',1);
        $curr = settingHelper('default_currency');
        $currency = $currencies->where('id',$curr)->first();
        if($currency)
        {
            $exchange_rate = $currency->exchange_rate;
            return round($amount * $exchange_rate,(int)settingHelper('no_of_decimals'));
        }
    }

    public function orderStatistics($report_type, $first_load)
    {
        $pending_order          = 0;
        $processing_order       = 0;
        $completed_order        = 0;
//        $canceled_order         = 0;
        $orders                 = $this->order->all()
                                        ->when(settingHelper('seller_system') != 1,function ($q){
                                            $q->where('seller_id', 1);
                                        })
                                        ->when(authUser()->user_type == 'seller',function ($q){
                                        $q->where('seller_id',authId());
                                    });
        $now = Carbon::now();
        switch($report_type){

            case 'today' :
                $today                          = date('Y-m-d');
                $orders                         = $orders->where('created_at', '>=', $today. ' 00:00:00')
                                                         ->where('created_at', '<=', $today. ' 23:59:59')->where('is_cancelled',0);

                break;
            case 'yesterday':
                $yesterday                      = date('Y-m-d', strtotime('-1 day'));
                $orders                         = $orders->where('created_at', '>=', $yesterday. ' 00:00:00')
                                                    ->where('created_at', '<=', $yesterday. ' 23:59:59')->where('is_cancelled',0);
                break;
            case 'this_week':
                $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY))). ' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY))). ' 23:59:59';
                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'last_week':
                $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY).('-1 week'))). ' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY).('-1 week'))). ' 23:59:59';
                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'this_month':
                $start_day                      = date('Y-m-'.'01'). ' 00:00:00';
                $end_day                        = date('Y-m-t'). ' 23:59:59';

                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'last_month':
                $start_day                      = date('Y-m-d',strtotime("first day of -1 month")). ' 00:00:00';
                $end_day                        = date('Y-m-d',strtotime("last day of -1 month")). ' 23:59:59';

                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'last_3_month':
                $start_day                      = date('Y-m', strtotime('-3 month')).'-01'.' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime('last day of -1 month')). ' 23:59:59';

                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'last_6_month':
                $start_day                      = date('Y-m', strtotime('-6 month')).'-01'.' 00:00:00';
                $end_day                        = date('Y-m', strtotime('first day of -1 month')). ' 23:59:59';

                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'this_year':
                $start_day                      = date('Y-'.'01-01 00:00:00');
                $end_day                        = date('Y-'.'12 -31 23:59:59');
                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
            case 'last_year':
                $start_day  = date('Y-'.'01', strtotime('-1 year')).'-01 00:00:00';
                $end_day    = date('Y-'.'12',strtotime('-1 year')). '-31 23:59:59';
                $orders                         = $orders->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day)->where('is_cancelled',0);
                break;
        }

        $processing_order = $orders->get();
        $pending_order    = $orders->get();
        $completed_order  = $orders->get();

        $processing_order               = $processing_order->whereIn('delivery_status',['confirm','picked_up','on_the_way']);
        $pending_order                  = $pending_order->where('delivery_status','pending');
        $completed_order                = $completed_order->where('delivery_status','delivered');
//

        $refunded               = $orders->withSum('processedRefunds', 'refund_amount')->get();
        $completed_order_price  = $completed_order->where('delivery_status','delivered')->sum('total_payable');

        $data = [
            'pending_order'           => $pending_order->count(),
            'pending_order_price'     => $pending_order->sum('total_payable'),
            'processing_order'        => $processing_order->count(),
            'processing_order_price'  => $processing_order->sum('total_payable'),
            'completed_order'         => $completed_order->count(),
            'completed_order_price'   => $completed_order_price - $refunded->sum('processed_refunds_sum_refund_amount'),
        ];
        if($first_load):
            return $data;
        else:
            return view('admin.dashboard-content.order-statistics',$data)->render();
        endif;
    }

    public function topCategories()
    {
        $categories = $this->category->allCategory()->where('parent_id',null);

        $data = [];

        foreach ($categories as $category) {
            $category_ids = \App\Utility\CategoryUtility::getMyAllChildIds($category->id);
            $category_ids[] = $category->id;
            $orders = Product::whereIn('category_id', $category_ids)
                                ->when(settingHelper('seller_system') != 1,function ($q){
                                    $q->where('user_id', 1);
                                })->sum('total_sale');

            if ($orders > 0):
                $data[$category->id] = $orders;
            endif;
        }
        arsort($data);
        $top_five = array_slice($data, 0, 5, true);

        $top_categories = [];

        foreach ($top_five as $category => $total_sale){
            $category = $this->category->get($category);
            if (!blank($category)):
                $cat['name']  = $category->getTranslation('title', \App::getLocale());
                $cat['image'] = getFileLink('40x40', $category->logo);
                $cat['total_sale'] = $total_sale;
                $cat['slug']       = $category->slug;

                array_push($top_categories, $cat);
            endif;
        }
        return $top_categories;
    }

    public function topSellers()
    {
        $data = [];
        $products = Product::with('user')->where('user_id','!=',1)
            ->groupBy('user_id')->selectRaw('SUM(total_sale) AS seller_total_sale,user_id')
            ->orderBy('seller_total_sale','desc')->take(5)->get();

        foreach ($products as $key => $product){
            $seller = $product->user;

            if (!blank($seller)):
                $seller_profile     = $seller->sellerProfile;
                $item['shop_name']  = $seller_profile->shop_name;
                $item['image']      = getFileLink('72x72', $seller_profile->logo);
                $item['total_sale'] = $product->seller_total_sale;
                $item['slug']       = $seller_profile->slug;

                $data[] = $item;
            endif;
        }
        return $data;
    }

    public function topProducts($report_type, $first_load)
    {
        $products = OrderDetail::with('product.productLanguages','order')
                                ->when(!addon_is_activated('wholesale'), function ($q){
                                    $q->whereHas('product',function ($qu){
                                        $qu->where('is_wholesale',0);
                                    });
                                })->whereDoesntHave('refund',function ($q){
                                    $q->where('status','processed');
                                })->whereHas('order',function ($q){
                                    $q->where('delivery_status','delivered')
                                        ->when(settingHelper('seller_system') != 1,function ($q){
                                            $q->where('seller_id', 1);
                                        })
                                        ->when(authUser()->user_type == 'seller',function ($q){
                                            $q->where('seller_id',authId());
                                        });
                                })->groupBy('product_id');

        $now = Carbon::now();
        switch($report_type){
            case 'this_week':
                $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY))). ' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY))). ' 23:59:59';
                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'last_week':
                $start_day                      = date('Y-m-d', strtotime($now->startOfWeek(Carbon::SATURDAY).('-1 week'))). ' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime($now->endOfWeek(Carbon::FRIDAY).('-1 week'))). ' 23:59:59';
                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'this_month':
                $start_day                      = date('Y-m-'.'01'). ' 00:00:00';
                $end_day                        = date('Y-m-t'). ' 23:59:59';

                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'last_month':
                $start_day                      = date('Y-m-d',strtotime("first day of -1 month")). ' 00:00:00';
                $end_day                        = date('Y-m-d',strtotime("last day of -1 month")). ' 23:59:59';

                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'last_3_month':
                $start_day                      = date('Y-m', strtotime('-3 month')).'-01'.' 00:00:00';
                $end_day                        = date('Y-m-d', strtotime('last day of -1 month')). ' 23:59:59';

                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'last_6_month':
                $start_day                      = date('Y-m', strtotime('-6 month')).'-01'.' 00:00:00';
                $end_day                        = date('Y-m', strtotime('first day of -1 month')). ' 23:59:59';

                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'this_year':
                $start_day                      = date('Y-'.'01-01 00:00:00');
                $end_day                        = date('Y-'.'12 -31 23:59:59');
                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
            case 'last_year':
                $start_day                      = date('Y-'.'01', strtotime('-1 year')).'-01 00:00:00';
                $end_day                        = date('Y-'.'12',strtotime('-1 year')). '-31 23:59:59';
                $products                       = $products->where('created_at', '>=', $start_day)
                                                    ->where('created_at', '<=', $end_day);
                break;
        }

        $order_details = $products->selectRaw('order_details.*, sum(quantity) as total_quantity')->orderByDesc('total_quantity')->take(10)->get();
        $data = [];
        foreach ($order_details as $key => $order_detail){
            $item['product_name']  = $order_detail->product->getTranslation('name', app()->getLocale());
            $item['image']      = getFileLink('72x72', $order_detail->product->thumbnail);
            $item['total_sale'] = $order_detail->total_quantity;
            $item['slug']       = $order_detail->product->slug;

            $data[$key] = $item;
        }

        if($first_load):
            return $data;
        else:
            return view('admin.dashboard-content.top-products',compact('data'))->render();
        endif;
    }
}
