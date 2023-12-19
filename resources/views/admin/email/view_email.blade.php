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
                        <li class="menu-title"><a href="{{ url('admin/email/compose') }}"
                                class="btn btn-primary btn-block">Compose</a></li>
                        <li class="active">
                            <a href="{{url('admin/email/send-email')}}">Sent Mail</a>
                        </li>
                        <li>
                            <a href="{{url('admin/email/trash')}}">Trash</a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">


            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">View Message</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="mailview-content">
                                <div class="mailview-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="text-ellipsis m-b-10">
                                                <span class="mail-view-title">{{ $email->subject }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mail-view-action">
                                                <button type="button" class="btn btn-white btn-sm"
                                                    data-toggle="tooltip" title="Print"> <i
                                                        class="fa fa-print"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sender-info">
                                        <div class="sender-img">
                                            <img width="40" alt="" src="assets/img/user.jpg"
                                                class="rounded-circle">
                                        </div>
                                        <div class="receiver-details float-left">
                                            <span class="sender-name">{{ $email->email }}</span>
                                        </div>
                                        <div class="mail-sent-time">
                                            <span class="mail-time">{{ $email->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="mailview-inner">
                                    <p>{!! $email->message !!}</p>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
