<?php

namespace App\Repositories\Admin\Addon;

use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;

class ChatSystemRepository
{
    public function messageUser($user,$data=[]): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return ChatRoom::with('user','receiver','lastMessage')->whereHas('lastMessage')->where(function ($query) use($user) {
            $query->where('user_id',$user->id)->orWhere('receiver_id',$user->id);
        })->when(arrayCheck('search',$data),function ($query) use($data) {
            $query->whereHas('user',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            })->orWhereHas('receiver',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            });
        })->latest()->paginate(10);
    }

    //handle user message for seller App Api.
    public function messageUserWithApi($user_id,$data=[]): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return ChatRoom::with('user','receiver','lastMessage')->whereHas('lastMessage')->where(function ($query) use($user_id) {
            $query->where('receiver_id',$user_id);
        })->when(arrayCheck('search',$data),function ($query) use($data) {
            $query->whereHas('user',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            })->orWhereHas('receiver',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            });
        })->latest()->paginate(10);
    }

    public function firstChatroom($user)
    {
        return ChatRoom::with('user','receiver','lastMessage')->whereHas('lastMessage')->where(function ($query) use($user) {
            $query->where('user_id',$user->id)->orWhere('receiver_id',$user->id);
        })->latest()->first();
    }

    public function userMessages($chat_room): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $chat_room->messages()->update(['is_seen' => 1]);

        return Message::with('chatRoom')->where('chat_room_id',$chat_room->id)->latest()->paginate(9);
    }

    public function findChatRoom($data)
    {
        return ChatRoom::where(function ($q) use ($data){
            $q->where(function ($query) use ($data){
                $query->where('user_id',$data['user_id'])->where('receiver_id',$data['receiver_id']);
            })->orWhere(function ($query) use ($data){
                $query->where('user_id',$data['receiver_id'])->where('receiver_id',$data['user_id']);
            });
        })->latest()->first();
    }

    public function sendMessage($data)
    {
        return Message::create($data);
    }

    public function createChatroom($data)
    {
        return ChatRoom::create($data);
    }

    public function find($id)
    {
        return ChatRoom::find($id);
    }

    public function chatSellers($data): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $previous_user = User::with('sellerProfile','chatRoom.lastMessage')->where('user_type','seller')->where('status',1)->where('is_user_banned',0)
        ->where('user_type','seller')->whereHas('chatRoom', function($q) use($data){
            $q->where('user_id', $data['customer_id']);
        })->whereHas('sellerProfile',function ($q){
            $q->where('verified_at','!=',null);
        })->when(arrayCheck('search',$data),function ($query) use($data) {
            $query->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
        })->when(arrayCheck('seller_name',$data),function ($query) use($data) {
            $query->where('user_type','seller')->whereHas('sellerProfile',function ($q) use($data) {
                    $q->where('shop_name','like','%'.$data['seller_name'].'%');
                });
        });
        $new_user = User::with('sellerProfile','chatRoom.lastMessage')->where('user_type','seller')->where('status',1)->where('is_user_banned',0)->whereHas('sellerprofile',function($q) use($data){
            $q->where('id','=', $data['current_seller_id']);
        })
        ->where('user_type','seller')->whereHas('sellerProfile',function ($q){
            $q->where('verified_at','!=',null);
        })->when(arrayCheck('search',$data),function ($query) use($data) {
            $query->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
        })->when(arrayCheck('seller_name',$data),function ($query) use($data) {
            $query->where('user_type','seller')->whereHas('sellerProfile',function ($q) use($data) {
                $q->where('shop_name','like','%'.$data['seller_name'].'%');
            });
        });

        return $new_user->union($previous_user)->paginate(25);
    }


    public function chatUsers($data): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return User::with('chatRoom.lastMessage')->where('status',1)->where('is_user_banned',0)
            ->where('user_type','customer')->where(function ($q) use($data) {
                $q->when(arrayCheck('search',$data),function ($query) use($data) {
                    $query->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            })->paginate(25);
    }
}
