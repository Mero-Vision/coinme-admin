<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Luminex</title>
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
                                        <label>Email</label>
                                         @if (isset($data['email']))
                                            <input type="text" value="{{ $data['email'] }}" class="form-control"
                                                name="email" />
                                        @else
                                            <input type="text" class="form-control" name="email" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Website Url</label>
                                        @if (isset($data['site_url']))
                                            <input type="text" value="{{ $data['site_url'] }}" class="form-control"
                                                name="site_url" />
                                        @else
                                            <input type="text" class="form-control" name="site_url" />
                                        @endif
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
