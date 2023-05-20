<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class UserMessageResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                $chat_room = $data->chatRoom;
                if ($data->type == 1)
                {
                    $sender     = $chat_room->user;
                    $receiver   = $chat_room->receiver;
                }
                else{
                    $sender     = $chat_room->receiver;
                    $receiver   = $chat_room->user;
                }
                $filesize = $file_exist = null;
                if ($data->is_file == 1)
                {
                    $file_exist = file_exists(base_path('public/'.$data->file));
                    if ($file_exist)
                    {
                        $file = base_path('public/'.$data->file);
                        $filesize = filesize($file);
                        $filesize = round($filesize / 1024 / 1024, 2);
                        if ($filesize > 1)
                        {
                            $filesize = $filesize.' MB';
                        }
                        else{
                            $filesize = round($filesize * 1024, 2).' KB';
                        }
                    }
                    else{
                        $filesize = '0 KB';
                    }
                }

                $file_types = explode('/', $data->file_type);

                return [
                    'id'                => $data->id,
                    'sender_name'       => @$sender->full_name,
                    'sender_image'      => $sender->profile_image,
                    'receiver_name'     => $receiver->full_name,
                    'receiver_id'       => $receiver->id,
                    'receiver_image'    => $receiver->profile_image,
                    'message'           => $data->message,
                    'type'              => $data->type,
                    'page'              => (int)$request->page,
                    'last_page'         => (int)$this->lastPage(),
                    'is_file'           => (bool)$data->is_file,
                    'is_image'          => arrayCheck(0,$file_types) && $file_types[0] == 'image',
                    'file_type'         => $data->file_type,
                    'is_video'          => arrayCheck(0,$file_types) && $file_types[0] == 'video',
                    'file_size'         => $filesize,
                    'file_exist'        => $file_exist,
                    'file_url'          => $file_exist ? static_asset($data->file) : 'javascript:void(0)',
                    'created_at'        => $data->created_at
                ];
            })->reverse()->toArray(),

            'total'         => $this->total(),
            'count'         => $this->count(),
            'per_page'      => $this->perPage(),
            'current_page'  => $this->currentPage(),
            'total_pages'   => $this->lastPage(),
            'last_page'     => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'has_more_data' => $this->hasMorePages(),

        ];
    }
}
