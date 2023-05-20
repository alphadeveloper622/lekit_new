<?php

namespace App\Http\Controllers\Admin\Addons;

use App\Http\Requests\Addon\ChatMessengerRequest;
use App\Repositories\Interfaces\Admin\SettingInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class ChatMessengerController extends Controller
{

    protected $settings;
    public function __construct(SettingInterface $settings){

        $this->settings = $settings;

    }
    public function index()
    {
        return view('admin.chat-messenger.index');
    }

    public function update(ChatMessengerRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        if($request['chat_messenger'] == 'facebook'):
            if ($request->has('is_facebook_messenger_activated')):
                $request['is_facebook_messenger_activated'] = 1;
            else:
                $request['is_facebook_messenger_activated'] = 0;
            endif;
        elseif($request['chat_messenger'] == 'tawk'):
            if($request->has('is_tawk_messenger_activated')):
                $request['is_tawk_messenger_activated'] = 1;
            else:
                $request['is_tawk_messenger_activated'] = 0;
            endif;
        endif;
        DB::beginTransaction();
        try {
            $this->settings->update($request);
            Toastr::success(__('Chat Messenger Updated Successfully'));
            DB::commit();
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back();
        }
    }
}
