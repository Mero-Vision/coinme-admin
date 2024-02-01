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
                
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Client Geo Analytics Map</h4>
                                <a href="{{url('admin/analytics/client-geo-analytics')}}" class="card-link">Click Here</a>
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
