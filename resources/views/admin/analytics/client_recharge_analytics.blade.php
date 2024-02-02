<!DOCTYPE html>
<html lang="en">

<head>
    <title>Client Geo Analytics</title>
    @include('adminLayouts.header')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Client Recharge Amount Growth Data</h5>
                        <canvas id="myChart" style="width:100%; height: 400px;"></canvas>
                    </div>

                    <div class="col-md-6">
                         <h5>Client Recharge Amount By Coin Type</h5>
                       <div id="piechart_3d" style="width: 100%; height: 400px;"></div>
                    </div>


                </div>



                <script>
                    const labels = {!! json_encode(array_column($chartData, 'label')) !!};
                    const dataValues = {!! json_encode(array_column($chartData, 'value')) !!};

                    new Chart("myChart", {
                        type: "line",
                        data: {
                            labels: labels,
                            datasets: [{
                                data: dataValues,
                                borderColor: "red",
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            }

                        }
                    });
                </script>

                <script type="text/javascript">
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Total', 'Coin Type'],
                           <?php echo $coinData ?>
                        ]);

                        var options = {
                            title: 'Coin Recharge',
                            is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                </script>







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
