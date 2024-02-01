<!DOCTYPE html>
<html lang="en">

<head>
    <title>Client Geo Analytics</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">


                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['geochart'],
                    });
                    google.charts.setOnLoadCallback(drawRegionsMap);

                    function drawRegionsMap() {
                        var data = google.visualization.arrayToDataTable([
                            ['Country', 'No of Coin Luminex'],
                            <?php echo $chartdata?>
                        ]);

                        var options = {};

                        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                        chart.draw(data, options);
                    }
                </script>


                <div id="regions_div" style="width: 100%; height: 500px;"></div>







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
