<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\Product;
use App\Models\SellerSubscription;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SubscriptionCheck extends Command
{
    protected $signature = 'subscription:check';

    protected $description = 'Command description';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle(): int
    {
        $from_date = Carbon::now();

        $soon_expired_subscriptions = SellerSubscription::where('status', 1)->where('expires_at','>',$from_date)->get();

        $rows = [];

        foreach ($soon_expired_subscriptions as $soon_expired_subscription) {
            $diff_in_days = Carbon::now()->diffInDays($soon_expired_subscription->expires_at);

            if ($diff_in_days <= 10)
            {
                $rows[] = [
                    'user_id'       => $soon_expired_subscription->user_id,
                    'title'         => 'You subscription is about to end only '.$diff_in_days.' days left',
                    'details'       => 'You subscription is about to end only '.$diff_in_days.' days left',
                    'url'           => 'packages',
                    'status'        => 'unseen',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
        }

        $total_rows = array_chunk($rows, 1000);

        foreach ($total_rows as $item) {
            Notification::insert($item);
        }

        $user_ids = SellerSubscription::where('status', 1)->where('expires_at','<=',Carbon::now())->pluck('user_id')->toArray();

        Product::whereIn('user_id', $user_ids)->update(['status' => 'unpublished']);

        SellerSubscription::where('status', 1)->where('expires_at','<=',Carbon::now())->update(['status' => 0]);

        Log::info('Subscription Check: '.count($user_ids).' subscriptions found and will be expired.');

        return 0;
    }
}
