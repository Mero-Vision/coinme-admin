<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ auth()->user()->name }} Profile</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">



                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="{{ url('admin/profile/edit-profile') }}" class="btn btn-primary btn-rounded"><i
                                class="fa fa-plus"></i> Edit
                            Profile</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar"
                                                src="{{ auth()->user()->getFirstMediaUrl('profile_image') }}"
                                                alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ auth()->user()->name }}</h3>
                                                <small class="text-muted">{{ auth()->user()->status }}</small>
                                                <div class="staff-id">User ID : {{ auth()->user()->id }}</div>
                                                <div class="staff-msg"><a href="{{ url('admin/chat') }}"
                                                        class="btn btn-primary">Send
                                                        Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a
                                                            href="#">{{ auth()->user()->mobile_no }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a
                                                            href="#">{{ auth()->user()->email }}</a></span>
                                                </li>

                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">{{ auth()->user()->address }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">{{ auth()->user()->gender }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs nav-tabs-bottom nav-justified mt-4">
                    <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1"
                            data-toggle="tab">Front ID Image</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-toggle="tab">Back ID
                            Image</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">ID
                            Hand Image</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="bottom-justified-tab1">
                        @php
                            $frontImage = auth()
                                ->user()
                                ->getFirstMediaUrl('front_image');
                        @endphp
                        <img class="inline-block"
                            src="{{ $frontImage ? $frontImage : url('assets/img/no_image.jpeg') }}" alt="user"
                            style="max-width: 250px; max-height: 250px;" />

                    </div>
                    <div class="tab-pane" id="bottom-justified-tab2">
                        @php
                            $backImage = auth()
                                ->user()
                                ->getFirstMediaUrl('back_image');
                        @endphp
                        <img class="inline-block" src="{{ $backImage ? $backImage : url('assets/img/no_image.jpeg') }}"
                            alt="user2" style="max-width: 250px; max-height: 250px;" />
                    </div>
                    <div class="tab-pane" id="bottom-justified-tab3">
                        @php
                            $handImage = auth()
                                ->user()
                                ->getFirstMediaUrl('id_in_hand');
                        @endphp
                        <img class="inline-block" src="{{ $handImage ? $handImage : url('assets/img/no_image.jpeg') }}"
                            alt="user2" style="max-width: 250px; max-height: 250px;" />
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
