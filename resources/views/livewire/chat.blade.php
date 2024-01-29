<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home back-icon"></i> <span>Back to
                                Home</span></a>
                    </li>

                    <li class="menu-title">Direct Chats <a href="#" class="add-user-icon" data-toggle="modal"
                            data-target="#add_chat_user"><i class="fa fa-plus"></i></a>
                    </li>
                    @forelse ($users as $data)
                        <li>
                            <a href="#" wire:click.prevent="chatData('{{ $data->sender_id }}')"><span
                                    class="chat-avatar-sm user-img"><img src="#" alt=""
                                        class="rounded-circle"><span class="status online"></span></span>
                                {{ $data->name }}</a>
                        </li>
                    @empty
                    @endforelse


                </ul>
            </div>
        </div>
    </div>


    @if ($showChatContent)
       
        {{-- <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Jennifer Robinson"><img src=""
                                                    alt="" class="w-40 rounded-circle"><span
                                                    class="status online"></span></a>
                                        </div>
                                        <div class="user-info float-left">
                                            <a href="profile.html"><span class="font-bold">Hancie Phago</span>
                                        </div>
                                    </div>

                                    <ul class="nav custom-menu">
                                        <li class="nav-item">
                                            <a href="#chat_sidebar"
                                                class="nav-link task-chat profile-rightbar float-right"
                                                id="task_chat"><i class="fa fa-user"></i></a>
                                        </li>
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Delete
                                                    Conversations</a>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Hello. What can I do for you?</p>
                                                                <span class="chat-time">8:30 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">October 8th, 2015</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="Jennifer Robinson"
                                                                src="{{ url('assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>I'm just looking around.</p>
                                                                <p>Will you tell me something about yourself? </p>
                                                                <span class="chat-time">8:35 am</span>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Are you there? That time!</p>
                                                                <span class="chat-time">8:40 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>OK!</p>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="Jennifer Robinson"
                                                                src="{{ url('assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Typing ...</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="message-bar">
                                    <div class="message-inner">
                                        <a class="link attach-icon" href="#" data-toggle="modal"
                                            data-target="#drag_files"><img src="" alt=""></a>
                                        <div class="message-area">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Type message..."></textarea>
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary" type="button"><i
                                                            class="fa fa-send"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div> --}}
    @endif

</div>
