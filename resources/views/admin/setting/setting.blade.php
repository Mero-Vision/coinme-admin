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
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Filter Settings">
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">App Settings</h4>
                                <p class="card-text">Configure your app settings here.</p>
                                <a href="{{url('admin/settings/app-settings')}}" class="card-link">General Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Privacy Settings</h4>
                                <p class="card-text">Configure your personal password.</p>
                                <a href="{{url('admin/settings/change-password')}}" class="card-link">Change Password</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personalization Settings</h4>
                                <p class="card-text">Configure your website appearance.</p>
                                <a href="#" class="card-link">Change Design</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">About Us Settings</h4>
                                <p class="card-text">Ensure your app's "About Us" is updated.</p>
                                <a href="{{url('admin/settings/about_us')}}" class="card-link">Update</a>
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

     <script>
        // Filter cards based on the search input
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>


<!-- blank-page24:04-->

</html>
