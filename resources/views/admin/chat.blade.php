<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')



        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home back-icon"></i> <span>Back to
                                    Home</span></a>
                        </li>
                        <li class="menu-title">Direct Chats <a href="#" class="add-user-icon" data-toggle="modal"
                                data-target="#add_chat_user"><i class="fa fa-plus"></i></a></li>
                        <li>
                            <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg"
                                        alt="" class="rounded-circle"><span class="status online"></span></span>
                                Nitesh Hamal <span class="badge badge-pill bg-danger float-right">1</span></a>
                        </li>
                        <li>
                            <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg"
                                        alt="" class="rounded-circle"><span
                                        class="status offline"></span></span> Ajaya Timsina <span
                                    class="badge badge-pill bg-danger float-right">18</span></a>
                        </li>
                        <li>
                            <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg"
                                        alt="" class="rounded-circle"><span class="status away"></span></span>
                                Reyan Shrestha</a>
                        </li>
                        <li class="active">
                            <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg"
                                        alt="" class="rounded-circle"><span class="status online"></span></span>
                                Hancie Phago <span class="badge badge-pill bg-danger float-right">108</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>







        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Jennifer Robinson"><img
                                                    src="assets/img/patient-thumb-02.jpg" alt=""
                                                    class="w-40 rounded-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="user-info float-left">
                                            <a href="profile.html"><span class="font-bold">Hancie Phago</span> <i
                                                    class="typing-text">Typing...</i></a>
                                            <span class="last-seen">Last seen today at 7:50 AM</span>
                                        </div>
                                    </div>
                                    <div class="search-box">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="input-group-append">
                                                <button class="btn" type="button"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
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
                                                                src="{{url('assets/img/user.jpg')}}"
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
                                                                src="{{url('assets/img/user.jpg')}}"
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
                                            data-target="#drag_files"><img src="assets/img/attachment.png"
                                                alt=""></a>
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
                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item"><a class="nav-link active" href="#profile_tab"
                                            data-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                            <div class="tab-content chat-contents">
                                
                                <div class="content-full tab-pane show active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                    <div class="chat-profile-img">
                                                        <div class="edit-profile-img">
                                                            <img src="{{url('assets/img/user.jpg')}}" alt="">
                                                            <span class="change-img">Change Image</span>
                                                        </div>
                                                        <h3 class="user-name m-t-10 mb-0">Reyan Shrestha</h3>
                                                        <small class="text-muted">Admin</small>
                                                        <a href="edit-profile.html"
                                                            class="btn btn-primary edit-btn"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Username:</span>
                                                                <span
                                                                    class="float-right text-muted">@reyan720</span>
                                                            </li>
                                                            <li>
                                                                <span>DOB:</span>
                                                                <span class="float-right text-muted">3rd March</span>
                                                            </li>
                                                            <li>
                                                                <span>Email:</span>
                                                                <span
                                                                    class="float-right text-muted">reyan@example.com</span>
                                                            </li>
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="float-right text-muted">
                                                                    770-889-6484</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-overlay" data-reff=""></div>
        <script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ url('assets/js/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/adminbootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/adminapp.js') }}"></script>
        <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
</body>


<!-- blank-page24:04-->

</html>
