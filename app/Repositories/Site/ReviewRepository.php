<?php

namespace App\Repositories\Site;

use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewLike;
use App\Models\ReviewReply;
use App\Models\SellerProfile;
use App\Repositories\Interfaces\Site\ReviewInterface;
use App\Traits\AITrait;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use Sentinel;

class ReviewRepository implements ReviewInterface
{
    use ImageTrait,AITrait;

    public function get($product_id,$paginate)
    {
        return Review::with('replies.user:id,images,first_name,last_name','user:id,images,first_name,last_name','reviewLikes')
            ->where('product_id', $product_id)->where('status',1)->latest()->paginate($paginate);
    }

    public function paginateReviews($data)
    {
        return Review::with('replies.user:id,images,first_name,last_name','user:id,images,first_name,last_name','reviewLikes')->whereHas('product')
            ->when(authUser()->user_type == 'seller', function ($q){
                $q->whereHas('product', function ($q){
                    $q->where('user_id', authId());
                });
            })->when(arrayCheck('product_id',$data), function ($q) use ($data){
                $q->where('product_id', $data['product_id']);
            })->latest()->paginate(get_pagination('pagination'));
    }

    public function storeReview($request)
    {

        $review = Review::where('user_id',$request['user_id'])->where('product_id',$request['product_id'])->first();

        if ($review && $review->images)
        {
            $this->deleteFile($review->images['original_image'],$review->images['storage']);
        }

        if (array_key_exists('image',$request) && $request['image'])
        {
            $request['images'] = $this->saveImage($request['image'],'single_file')['images'];
        }

        if ($review)
        {
            $review->update($request);
        }
        else{
            $request['status'] = 1;
            $review = Review::create($request);
            if (settingHelper('ai_review_option') == 1 || (settingHelper('ai_review_option') == 2 && $review->product->user->ai_review_option == 1))
            {
                try {

                    ReviewReply::create([
                        'review_id'     => $review->id,
                        'user_id'       => $review->product->user_id,
                        'parent_id'     => null,
                        'level'         => 0,
                        'reply'         => $this->getTxt([
                            'prompt'    => 'appropriate feedback for ' . $review->comment,
                            'length'    => 100,
                        ])
                    ]);
                } catch (\Exception $e) {
                }
            }

        }

        $rating = Review::where('product_id',$request['product_id'])
            ->avg('rating');

        $product = $review->product;
        $product->rating = $rating;
        $product->save();

        $seller_product = Product::where('id',$request['product_id'])->first();
        if ($seller_product->user_id != 1):
            $user           = SellerProfile::where('user_id',$seller_product->user_id)->first();
            $seller_rating  = Product::where('user_id',$user->user_id)->where('rating','>',0)->avg('rating');
            $user->rating_count = $seller_rating;
            $user->increment('reviews_count');
            $user->save();
        endif;

        return $review;
    }

    public function storeLike($request)
    {
        return ReviewLike::create($request);
    }

    public function unLike($data)
    {
        return ReviewLike::where('reviewable_type',$data['reviewable_type'])->where('reviewable_id',$data['reviewable_id'])->where('user_id',$data['user_id'])->delete();
    }

    public function storeReply($request)
    {
        return ReviewReply::create($request);
    }

    public function reviewPercentage($product_id)
    {
        return Review::where('product_id',$product_id)->select('rating', DB::raw('count(*) as total'))
            ->groupBy('rating')->pluck('total','rating');
    }

    public function productReviews($product_id,$paginate): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Review::with('replies.user:id,images,first_name,last_name','user:id,images,first_name,last_name','reviewLikes')->withCount('reviewLikes')
            ->where('product_id',$product_id)
            ->paginate($paginate);
    }

    public function statusChange($request)
    {
            $review           = Review::find($request['id']);
            $review->status   = $request['status'];
            $review->save();

            return true;
    }
}
