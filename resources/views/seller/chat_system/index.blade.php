@extends('admin.partials.master')
@section('title')
    {{ __('Messages') }}
@endsection
@section('chat_system')
    active
@endsection
@php
    $q              = isset($_GET['q']) ? $_GET['q'] : null;
@endphp

@section('main-content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('chat_area') }}</h2>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">
                            <h4 class="mb-2">{{ __('Users') }}</h4>
                            <div class="w-100">
                                <div class="input-group mb-3 roundBDR">
                                    <input type="text" class="form-control" id="search_user"
                                           placeholder="{{ __('name') }}/{{ __('Email') }}" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                    class="bx bx-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border chat-brief">
                                @if($chat_room)
                                    <li class="loader">
                                        <i class="bx bx-loader">
                                        </i>
                                    </li>
                                @else
                                    <li class="media no_data">
                                        <div class="media-body">
                                            <div class="font-600-bold text-center text-danger">{{ __('no_data_found') }}</div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-8">
                    <div class="card chat-box" id="mychatbox2">
                        <div class="card-header">
                            <h4><i class="fas fa-circle text-success mr-2" title="" data-toggle="tooltip"
                                   data-original-title="Online"></i> {{ __('chat_with') }} <span
                                        class="selected_user_name">{{ $chat_room && $chat_room->user ? $chat_room->user->full_name : ''  }}</span>
                            </h4>
                        </div>
                        <div class="card-body chat-content" tabindex="3" id="chat-content">
                            @if(!$chat_room)
                                <div class="text-center mt-5 pt-5 no_msg">
                                    <h6 class="text-danger">{{ __('no_data_found') }}</h6>
                                </div>
                            @endif
                        </div> {{-- End Chat body --}}

                        <div class="card-footer chat-form d-flex align-items-end ">
                            <div>
                                <label for="file">
                                    <input type="file" id="file" class="d-none" multiple>
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                         clip-rule="evenodd">
                                        <path d="M11.5 0c6.347 0 11.5 5.153 11.5 11.5s-5.153 11.5-11.5 11.5-11.5-5.153-11.5-11.5 5.153-11.5 11.5-11.5zm0 1c5.795 0 10.5 4.705 10.5 10.5s-4.705 10.5-10.5 10.5-10.5-4.705-10.5-10.5 4.705-10.5 10.5-10.5zm.5 10h6v1h-6v6h-1v-6h-6v-1h6v-6h1v6z"
                                              fill="#999"></path>
                                    </svg>
                                </label>
                            </div>

                            <div class="input-content-preview ml-3 w-100" id="chat-form2">
                                <div class="row pl-3">
                                    <div class="col-lg-12 file_content d-flex">

                                    </div>
                                </div>
                                <div>
                                    <input type="text" id="msg" class="form-control"
                                           placeholder="{{ __('type_message') }}">
                                </div>
                            </div>

                            <button class="btn btn-primary disable_btn" id="send_msg">
                                <i class="bx bx-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" class="selected_chatroom" value="{{ $chat_room ? $chat_room->id : '' }}">
    <input type="hidden" value="{{ static_asset('images/default/default-document-40x40.png') }}" class="doc_img">
@endsection
@push('script')
    <script>
        let page = 1;
        let scroll_continue = true;
        let refresh_no = 1;
        let auto_refresh = true;
        let files = [];
        $(document).ready(function () {
            setInterval(function () {
                searchUser();
            }, 5000);

            $(document).on('keyup', '#search_user', function () {
                searchUser();
            });
            $(document).on('click', '.user_li', function () {
                $(this).addClass('active').siblings().removeClass('active');
                var chat_room_id = $(this).data('chat_room_id');
                var user_name = $(this).data('user_name');
                $('.selected_chatroom').val(chat_room_id);
                $('.selected_user_name').text(user_name);
                $('.chat-content').empty();
                page = 1;
                fetchMessages(1);
            });
            $(document).on('click', '#send_msg', function () {
                let length = files.length;
                let msg = $('#msg').val();
                if (length > 0) {
                    for (let i = 0; i < length; i++) {
                        sendMessage(files[i], i);
                    }
                }
                if (msg) {
                    sendMessage();
                }
            });
            $(document).on('keyup', '#msg', function (event) {
                if (event.key === "Enter") {
                    let length = files.length;
                    let msg = $('#msg').val();
                    if (length > 0) {
                        for (let i = 0; i < length; i++) {
                            sendMessage(files[i]);
                        }
                    }
                    if (length == 0 && msg) {
                        sendMessage();
                    }
                }
            });
            $('#chat-content').scroll(function () {
                loadMessages();
            });
            $(document).on('click', '.delete_file', function () {
                let index = $(this).data('id');
                files.splice(index, 1);
                $(this).closest('.file_div').remove();
                removeEventListener("change", previewFile);
            });
            $(document).on('change', '#file', function (event) {
                previewFile(event);
            });
            $(document).on('click', ".chat-dropdown", function () {
                $(this).toggleClass("active");
            });
            window.onclick = function () {
                $(".chat-dropdown").removeClass('active');
            };
            $(document).on('click', '.chat-mgs-details, .chat-dropdown', function (e) {
                e.stopPropagation();
            });
        });

        function searchUser() {
            let val = $('#search_user').val();
            let chat_room = $('.selected_chatroom').val();

            $.ajax({
                url: "{{ route('search.message.user') }}",
                type: "GET",
                data: {
                    search: val,
                    chat_room_id: chat_room
                },
                success: function (data) {
                    $('.list-unstyled').html(data.html);
                    $('.selected_chatroom').val(data.chat_room_id);
                    if(chat_room)
                    {
                        refreshMessages(1, 1);
                    }
                }
            });
        }

        function fetchMessages(scroll) {
            let chat_room = $('.selected_chatroom').val();
            scroll_continue = false;
            auto_refresh = false;
            $.ajax({
                url: "{{ route('fetch.messages') }}",
                type: "GET",
                data: {
                    chat_room_id: chat_room,
                    page: page
                },
                success: function (data) {
                    let selector = $('.chat-content');
                    $('.no_msg').remove();
                    selector.prepend(data.html);
                    $('#send_msg').removeClass('disable_btn');
                    scroll_continue = true;
                    page++;
                    if (scroll) {
                        setTimeout(function () {
                            scrollToBottom();
                        }, 100);
                    } else {
                        if(data.has_data)
                        {
                            let element = document.getElementById('chat-content');
                            element.scrollTop = element.scrollHeight - (element.scrollHeight - 500);
                        }
                    }
                }
            });
        }

        function refreshMessages(scroll, current_page) {
            let chat_room = $('.selected_chatroom').val();

            $.ajax({
                url: "{{ route('fetch.messages') }}",
                type: "GET",
                data: {
                    chat_room_id: chat_room,
                    page: current_page ? current_page : page
                },
                success: function (data) {
                    $('.no_msg').remove();
                    $('.chat-content .page_1').remove();
                    $('.chat-content').append(data.html);
                    $('#send_msg').removeClass('disable_btn');
                    if (scroll && refresh_no == 1) {
                        setTimeout(function () {
                            scrollToBottom();
                        }, 100);
                    }
                    refresh_no++;
                }
            });
        }

        function sendMessage(file, index) {
            let msg = $('#msg').val();
            if (!msg && !file) {
                return false;
            }

            if (file) {
                msg = file.name;
            }

            let chat_room = $('.selected_chatroom').val();

            let formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('msg', msg);
            formData.append('chat_room_id', chat_room);

            if (file) {
                formData.append('file_type', file.type);
                formData.append('file', file);
            }

            $(this).addClass('disable_btn');
            $.ajax({
                url: "{{ route('send.message') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (!file) {
                        $('#msg').val('');
                    }
                    refresh_no = 1;
                    // $('.chat-content').append("<div class='chat-right'><div class='chat-detail'>" + data.msg + "</div></div>");
                    page = 1;
                    if (index > -1) {
                        files.splice(index, 1);
                        $('.file_div#' + index).remove();
                    }

                    refreshMessages(1);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        const scrollToBottom = () => {
            const element = document.getElementById('chat-content');
            element.scrollTop = element.scrollHeight;
        }

        function loadMessages() {
            var lastScrollTop = 0;

            let element = document.getElementById('chat-content');
// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
            element.addEventListener("scroll", function () { // or window.addEventListener("scroll"....
                var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
                if (st > lastScrollTop) {
                    auto_refresh = true;
                } else {
                    auto_refresh = false;
                    if (element.scrollTop === 0 && scroll_continue) {
                        fetchMessages(0);
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
            }, false);
        }

        function previewFile(event) {

            let inputted_files = event.target.files;

            for (let i = 0; i < inputted_files.length; i++) {
                let file = inputted_files[i];
                let index = files.length;
                files.push(file);
                if (file) {
                    let type = file.type.split('/')[0];
                    if (type == 'image') {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            let img = '<div class="file_div mr-3" id="' + index + '"><a href="javascript:void(0)" class="delete_file"><i class="bx bx-x"></i></a>' +
                                '<p class="file_name"><img src="' + reader.result + '" alt="preview image" class="img-fluid" width="50"></p>' +
                                '</div>';
                            $('.file_content').append(img);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        let image = $('.doc_img').val();
                        let img = '<div class="file_div mr-3"><a href="javascript:void(0)" class="delete_file"><i class="bx bx-x"></i></a>' +
                            '<p class="file_name"><img src="' + image + '" alt="preview image" class="img-fluid" width="50"> <span class="name_clip">' + file.name + '</span></p>' +
                            '</div>';
                        $('.file_content').append(img);
                    }
                }
            }
            document.getElementById('file').value = '';
        }
    </script>
@endpush