<?php

namespace App\Http\Controllers\Seller\Addons;

use App\Http\Controllers\Controller;
use App\Http\Resources\Seller\ChatSellerResource;
use App\Http\Resources\SiteResource\UserMessageResource;
use App\Repositories\Admin\Addon\ChatSystemRepository;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatSystemController extends Controller
{
    use ImageTrait;

    protected $chatSystemRepository;

    public function __construct(ChatSystemRepository $chatSystemRepository)
    {
        $this->chatSystemRepository = $chatSystemRepository;
    }

    public function index()
    {
        $data = [
            'chat_room' => $this->chatSystemRepository->firstChatroom(authUser()),
        ];

        return view('seller.chat_system.index',$data);
    }

    public function searchUser(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            $chatRooms = $this->chatSystemRepository->messageUser(authUser(), $request->all());
            $selected_chat_room = $request->chat_room_id;
            $html = '';
            if (count($chatRooms) == 0) {
                $chat_room = '';
                $html .= view('seller.chat_system.chat_user', compact('chat_room'))->render();
            }
            foreach ($chatRooms as $key => $chat_room) {
                if ($key == 0 && $selected_chat_room == null) {
                    $selected_chat_room = $chat_room->id;
                }
                $data = [
                    'chat_room'             => $chat_room,
                    'selected_chat_room'    => $request->chat_room_id,
                ];
                $html .= view('seller.chat_system.chat_user', $data)->render();
            }
            return response()->json([
                'html'          => $html,
                'chat_room_id'  => $selected_chat_room,
                ]);
        } catch (\Exception $e) {
            $chat_room = '';
            return response()->json(['html' => view('seller.chat_system.chat_user', compact('chat_room'))->render()], 200);
        }
    }

    public function fetchMessages(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = validator($request->all(), [
            'chat_room_id'  => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        DB::beginTransaction();
        try {
            $chat_room = $this->chatSystemRepository->find($request->chat_room_id);

            if (!$chat_room)
            {
                $data = [
                    'user_messages' => [],
                    'page'          => $request->page,
                ];
                return response()->json([
                    'html' => view('seller.chat_system.messages',$data)->render(),
                    'has_data' => false
                ], 200);
            }

            $messages = $this->chatSystemRepository->userMessages($chat_room);

            $data = [
                'user_messages' => $messages,
                'page'          => $request->page
            ];

            DB::commit();
            return response()->json([
                'html' => view('seller.chat_system.messages',$data)->render(),
                'has_data' => $messages->nextPageUrl()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendMsg(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = validator($request->all(), [
            'msg'           => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $data = $request->all();
            $chatroom = $this->chatSystemRepository->find($request->chat_room_id);

            if (!$chatroom && authUser()->user_type != 'customer')
            {
                return response()->json(['error' => __('you_cannot_start_conversation')], 401);
            }

            if (!$chatroom) {
                $chatroom = $this->chatSystemRepository->createChatroom([
                    'user_id'       => authUser()->id,
                    'receiver_id'   => $request->receiver_id,
                ]);
            }

            $this->chatSystemRepository->sendMessage([
                'chat_room_id'  => $chatroom->id,
                'message'       => $request->msg,
                'type'          => $chatroom->user_id == authid() ? 1 : 2,
                'is_file'       => $request->hasFile('file'),
                'file_type'     => $request->hasFile('file') ? $request->file_type : null,
                'file'          => arrayCheck('file',$data) && $request->hasFile('file') ? $this->saveFile($data['file'],$request->file_type,false) : null,
            ]);

            return response()->json([
                'success'       => 'Message sent successfully',
                'chat_room_id'  => $chatroom->id,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //frontend route
    public function chatSeller(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $users = $this->chatSystemRepository->chatSellers($request->all());

            return response()->json([
                'sellers' => new ChatSellerResource($users),
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function frontendMessages(Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $chat_room = $this->chatSystemRepository->find($request->chat_room_id);

            if (!$chat_room)
            {
                $data = [
                    'user_messages' => [
                        'data'      => []
                    ],
                    'page'          => $request->page,
                ];
                return response()->json($data, 200);
            }

            $messages = $this->chatSystemRepository->userMessages($chat_room);

            $data = [
                'user_messages' => new UserMessageResource($messages),
                'page'          => $request->page
            ];

            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
