@if($chat_room)
    @php
        $chat_room_user = $chat_room->user;
    @endphp
<li class="media user_li {{ $selected_chat_room == $chat_room->id ? 'active' : '' }}" data-chat_room_id="{{ $chat_room->id }}" data-user_name="{{ $chat_room_user->full_name }}">
    <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ $chat_room_user->profile_image }}">
    <div class="media-body">
        <div class="mt-0 mb-1 font-weight-bold">{{ $chat_room_user->full_name }}</div>
        <div class="font-600-bold side_msg_minify">{{ $chat_room->lastMessage->message }}</div>
    </div>
</li>
@else
    <li class="media no_data">
        <div class="media-body">
            <div class="font-600-bold text-center text-danger">{{ __('no_data_found') }}</div>
        </div>
    </li>
@endif

