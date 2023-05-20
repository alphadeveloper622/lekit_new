<?php

namespace App\Http\Resources\Seller;

use App\Models\ChatRoom;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class ChatUserApiResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                $chat_room = ChatRoom::where('user_id', $data->id)->where('receiver_id',authUser($request)->id)->first();
                $last_message = @$chat_room->lastMessage;
                return [
                    'user_id'           => $data->user->id,
                    'user_name'         => $data->user->full_name,
                    'user_email'        => $data->user->email,
                    'chat_room_id'      => $data->id ? $data->id : '',
                    'logo'              => isset($data->user->images['image_20x20']) ?static_asset($data->user->images['image_20x20']) :static_asset('images/default/user40x40.jpg'),
                    'has_message'       => (bool)$data->lastMessage,
                    'message'           => $data->lastMessage ? [
                        'message'       => $data->lastMessage->message,
                        'file_type'     => $data->lastMessage->file_type,
                        'is_file'       => (bool)$data->lastMessage->is_file,
                        'is_seen'       => (bool)$data->lastMessage->is_seen,
                        'file'          => $data->lastMessage->is_file ? static_asset($data->lastMessage->file) : '',
                        'created_at'    => $data->lastMessage->created_at->diffForHumans(),
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
