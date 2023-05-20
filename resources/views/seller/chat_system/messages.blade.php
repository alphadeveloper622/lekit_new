{{-- <i class='bx bxs-file-pdf' ></i>
                             <i class='bx bx-data' ></i>
                             <i class='bx bxs-file-html' ></i>
                             <i class='bx bxs-file-css' ></i>
                             <i class='bx bxs-file-doc' ></i>
                             <i class='bx bxs-file-txt' ></i>
                             <i class='bx bxs-file-archive' ></i> --}}
                             @if(count($user_messages) > 0)
                             @foreach($user_messages->reverse() as $message)
                                 @php
                                     $chat_room = $message->chatRoom;
                                     if ($message->type == 1)
                                     {
                                         $sender = $chat_room->user;
                                         $receiver = $chat_room->receiver;
                                     }
                                     else{
                                         $sender = $chat_room->receiver;
                                         $receiver = $chat_room->user;
                                     }
                                     $filesize = $file_exist = false;
                                     if ($message->is_file == 1)
                                     {
                                         $file_exist = file_exists(base_path('public/'.$message->file));
                                         if ($file_exist)
                                         {
                                             $file = base_path('public/'.$message->file);
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
                                     $file_types = explode('/', $message->file_type);
                                 @endphp
                                 @if($receiver->id == authId())
                                     <div class="chat-mgs-list user-left page_{{ $page }}">
                                         <div class="chat-mgs-details d-flex align-items-start">
                                             @if($message->is_file == 1)
                                                 <div class="sending-file-view">
                                                     @if(arrayCheck(0,$file_types) && $file_types[0] == 'image')
                                                         @if($file_exist)
                                                             <a href="{{ static_asset($message->file) }}" download><img
                                                                         src="{{ static_asset($message->file) }}" alt="image"></a>
                                                         @else
                                                             <img src="{{ static_asset('images/default/no_image.jpg') }}" alt="image">
                                                         @endif
                                                     @elseif(arrayCheck(0,$file_types) && $file_types[0] == 'video')
                                                         @if($file_exist)
                                                             <video width="320" height="240" controls>
                                                                 <source src="{{ static_asset($message->file) }}"
                                                                         type="{{ $message->file_type }}">
                                                             </video>
                                                         @else
                                                             <img src="{{ static_asset('images/default/default-video-72x72.png') }}" alt="image">
                                                         @endif
                                                     @else
                                                         <div class=" chat-mgs-text">
                                                             <p>{{ __('File') }}</p>
                                                             <div class="file-view-content">
                                                                 <div class="file-view-icon">
                                                                     <i class='bx bx-file'></i>
                                                                 </div>
                                                                 <div class="file-view-name">
                                                                     <h6>{{ $message->message }}</h6>
                                                                     <span>{{ $filesize }}</span>
                                                                 </div>
                                                                 <ul class="mb-0">
                                                                     <li>
                                                                         <a href="{{ $file_exist ? static_asset($message->file) : 'javascript:void(0)' }}"
                                                                            download><i class='bx bx-download'></i></a></li>
                                                                 </ul>
                                                             </div>
                                                         </div>
                                                     @endif
                                                     @if($file_exist)
                                                         <div class="chat-mgs-time">{{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</div>
                                                     @else
                                                         <div class="chat-mgs-time no_file">{{ __('file_not_exist') }}</div>
                                                     @endif
                                                 </div>
                                             @else
                                                 <div>
                                                     <div class="chat-mgs-text">{{ $message->message }}</div>
                                                     <div class="chat-mgs-time">{{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</div>
                                                 </div>
                                             @endif
                                             <!--                    <div class="chat-dropdown">
                                                 <i class='bx bx-dots-vertical-rounded'></i>
                                                 <div class="chat-dropdown-menu">
                                                     <ul>
                                                         <li><a href="#">{{ __('copy') }} <i class='bx bx-copy'></i></a></li>
                                                         <li><a href="#">{{ __('Save') }} <i class='bx bx-save'></i></a></li>
                                                         <li><a href="#">{{ __('Froward') }} <i class='bx bx-fast-forward'></i></a></li>
                                                         &lt;!&ndash;                                <li><a href="#">{{ __('Delete') }}
                                             <svg clip-rule="evenodd" fill-rule="evenodd"
                                                  stroke-linejoin="round" stroke-miterlimit="2" height="14px"
                                                  width="14px" viewBox="0 0 24 24"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                 <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z"
                                                       fill-rule="nonzero"/>
                                             </svg>
                                         </a>
                                     </li>&ndash;&gt;
                                                     </ul>
                                                 </div>
                                             </div>-->
                                         </div>
                                         <div class="user-avater">
                                             <img src="{{ $receiver->user_profile_image }}" alt="{{ $receiver->full_name }}">
                                         </div>
                                     </div>
                                 @else
                                     <div class="chat-mgs-list user-right page_{{ $page }}">
                                         <div class="chat-mgs-details d-flex align-items-start">
                                             @if($message->is_file == 1)
                                                 <div class="sending-file-view">
                                                     @if(arrayCheck(0,$file_types) && $file_types[0] == 'image')
                                                         @if($file_exist)
                                                             <a href="{{ static_asset($message->file) }}" download><img
                                                                         src="{{ static_asset($message->file) }}" alt="image"></a>
                                                         @else
                                                             <img src="{{ static_asset('images/default/no_image.jpg') }}" alt="image">
                                                         @endif
                                                     @elseif(arrayCheck(0,$file_types) && $file_types[0] == 'video')
                                                         @if($file_exist)
                                                             <video width="320" height="240" controls>
                                                                 <source src="{{ static_asset($message->file) }}"
                                                                         type="{{ $message->file_type }}">
                                                             </video>
                                                         @else
                                                             <img src="{{ static_asset('images/default/default-video-72x72.png') }}" alt="image">
                                                         @endif
                                                     @else
                                                         <div class=" chat-mgs-text">
                                                             <p>{{ __('File') }}</p>
                                                             <div class="file-view-content">
                                                                 <div class="file-view-icon">
                                                                     <i class='bx bx-file'></i>
                                                                 </div>
                                                                 <div class="file-view-name">
                                                                     <h6>{{ $message->message }}</h6>
                                                                     <span>{{ $filesize }}</span>
                                                                 </div>
                                                                 <ul class="mb-0">
                                                                     <li>
                                                                         <a href="{{ $file_exist ? static_asset($message->file) : 'javascript:void(0)' }}"
                                                                            download><i class='bx bx-download'></i></a></li>
                                                                 </ul>
                                                             </div>
                                                         </div>
                                                     @endif
                                                     <div class="chat-mgs-time">{{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</div>
                                                 </div>
                                             @else
                                                 <div>
                                                     <div class="chat-mgs-text">{{ $message->message }}</div>
                                                     <div class="chat-mgs-time">{{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</div>
                                                 </div>
                                             @endif
                                             <!--                    <div class="chat-dropdown">
                                                 <i class='bx bx-dots-vertical-rounded'></i>
                                                 <div class="chat-dropdown-menu">
                                                     <ul>
                                                         <li><a href="#">{{ __('copy') }} <i class='bx bx-copy'></i></a></li>
                                                         <li><a href="#">{{ __('Save') }} <i class='bx bx-save'></i></a></li>
                                                         <li><a href="#">{{ __('Froward') }} <i class='bx bx-fast-forward'></i></a></li>
                                                         &lt;!&ndash;                                <li><a href="#">{{ __('Delete') }}
                                             <svg clip-rule="evenodd" fill-rule="evenodd"
                                                  stroke-linejoin="round" stroke-miterlimit="2" height="14px"
                                                  width="14px" viewBox="0 0 24 24"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                 <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z"
                                                       fill-rule="nonzero"/>
                                             </svg>
                                         </a>
                                     </li>&ndash;&gt;
                                                     </ul>
                                                 </div>
                                             </div>-->
                                         </div>
                                         <div class="user-avater">
                                             <img src="{{ $sender->user_profile_image }}" alt="{{ $sender->full_name }}">
                                         </div>
                                     </div>
                                 @endif
                             @endforeach
                         @elseif($page == 1)
                             <div class="text-center mt-5 pt-5 no_msg">
                                 <h6 class="text-danger">{{ __('no_data_found') }}</h6>
                             </div>
                         @endif