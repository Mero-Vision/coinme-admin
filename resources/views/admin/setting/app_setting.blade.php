<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">



                <div class="row mt-5">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{url('admin/settings/post')}}" method="POST">
                            @csrf
                            <h3 class="page-title">App Settings</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>App Name <span class="text-danger">*</span></label>
                                        @if (isset($data['app_name']))
                                            <input type="text" value="{{ $data['app_name'] }}" class="form-control"
                                                name="app_name" />
                                        @else
                                            <input type="text" class="form-control" name="app_name" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Owner</label>
                                        <input class="form-control " value="Rehan Dhakal" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="rehan@example.com" type="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" value="818-978-7102" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input class="form-control" value="818-635-5579" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input class="form-control" value="818-978-7102" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Website Url</label>
                                        <input class="form-control" value="https://www.example.com" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </div>
                        </form>
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
