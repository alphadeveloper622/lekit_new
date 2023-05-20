<?php

namespace App\Http\Resources\Seller;

use App\Models\ChatRoom;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ChatSellerResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                $chat_room = ChatRoom::where('user_id', authUser($request)->id)->where('receiver_id',$data->id)->first();
                $last_message = @$chat_room->lastMessage;
                return [
                    'user_id'           => $data->id,
                    'user_name'         => $data->full_name,
                    'shop_id'           => $data->sellerProfile->id,
                    'chat_room_id'      => $chat_room ? $chat_room->id : '',
                    'shop_name'         => $data->sellerProfile->shop_name,
                    'logo'              => $data->sellerProfile->image_82x82,
                    'has_message'       => (bool)$last_message,
                    'message'           => $last_message ? [
                        'message'       => $last_message->message,
                        'file_type'     => $last_message->file_type,
                        'is_file'       => (bool)$last_message->is_file,
                        'is_seen'       => (bool)$last_message->is_seen,
                        'file'          => $last_message->is_file ? static_asset($last_message->file) : '',
                        'created_at'    => $last_message->created_at->diffForHumans(),
                    ] : '',
                ];
            }),

            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),
            'last_page' => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'has_more_data' => $this->hasMorePages(),
        ];
    }
}
