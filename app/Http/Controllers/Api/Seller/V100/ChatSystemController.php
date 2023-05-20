<?php

namespace App\Http\Controllers\Api\Seller\V100;

use App\Traits\ImageTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Seller\ChatUserApiResource;
use App\Traits\ApiReturnFormatTrait;

use App\Repositories\Admin\Addon\ChatSystemRepository;
use App\Http\Resources\SiteResource\UserMessageResource;

class ChatSystemController extends Controller
{
    use ApiReturnFormatTrait, ImageTrait;

    protected $chatSystemRepository;

    public function __construct(ChatSystemRepository $chatSystemRepository)
    {
        $this->chatSystemRepository = $chatSystemRepository;
    }

    public function users(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
           $users = $this->chatSystemRepository->messageUserWithApi(authUser($request)->id, $request->all());

            $data = new ChatUserApiResource($users);

            return $this->responseWithSuccess(__('User Retrieved Successfully'),$data);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function messages(Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $chat_room = $this->chatSystemRepository->find($request->chat_room_id);

            if (!$chat_room)
            {
                return $this->responseWithError(__('No Conversation Found'));
            }

            $messages = $this->chatSystemRepository->userMessages($chat_room);

            $data = [
                'messages' => new UserMessageResource($messages)
            ];

            DB::commit();
            return $this->responseWithSuccess(__('Conversation Retrieved'),$data);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        $validator = validator($request->all(), [
            'msg'   => 'required_without:file',
            'file'  => 'required_without:msg'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $user = authUser($request);
            $data = $request->all();
            $data['user_id'] = $user->id;

            $chatroom = $this->chatSystemRepository->findChatRoom($data);

            if (!$chatroom && $user->user_type != 'customer')
            {
                return response()->json(['error' => __('you_cannot_start_conversation')], 401);
            }

            $msg = $request->msg;

            if ($request->hasFile('file')) {
                $msg = $request->file('file')->getClientOriginalName();
            }

            $file_type = $request->hasFile('file') ? $request->file('file')->getMimeType() : '';

            $this->chatSystemRepository->sendMessage([
                'chat_room_id'  => $chatroom->id,
                'message'       => $msg,
                'type'          => 2,
                'is_file'       => $request->hasFile('file'),
                'file_type'     => $file_type,
                'file'          => arrayCheck('file',$data) && $request->hasFile('file') ? $this->saveFile($data['file'],$file_type,false) : '',
            ]);

            return $this->responseWithSuccess(__('Message Sent Successfully'));
        } catch (\Exception $e) {
            return $this->responseWithError(__('Message Sent Successfully'));
        }
    }
}
