<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Luminex</title>
    @include('adminLayouts.header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $totalTransactions }}</h3>
                                <span class="widget-title1">Transactions <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $totalClients }}</h3>
                                <span class="widget-title2">Clients <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-volume-control-phone"
                                    aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $totalContactUs }}</h3>
                                <span class="widget-title3">Contacts <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-btc" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $clientBalance }}</h3>
                                <span class="widget-title4">Clients Balance <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- ----------------- Second Row Data ---------------- --}}
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-lg-7 col-xl-7">

                        <div class="row">

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg4"><i class="fa fa-btc" aria-hidden="true"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $todayRecharge }}</h3>
                                        <span class="widget-title4">Today Recharge <i class="fa fa-check"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg4"><i class="fa fa-btc" aria-hidden="true"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $yesterdayRecharge }}</h3>
                                        <span class="widget-title4">Yesterday Recharge <i class="fa fa-check"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg4"><i class="fa fa-btc" aria-hidden="true"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $lastSevenDaysRecharge }}</h3>
                                        <span class="widget-title4">7 Days Recharge <i class="fa fa-check"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg4"><i class="fa fa-btc" aria-hidden="true"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $lastFifteenDaysRecharge }}</h3>
                                        <span class="widget-title4">15 Days Recharge <i class="fa fa-check"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg3 bg-danger"><i class="fa fa-btc"
                                            aria-hidden="true"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $frozenAmount }}</h3>
                                        <span class="widget-title2 bg-danger">30 Days Frozen Amount <i
                                                class="fa fa-check" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <div class="dash-widget">
                                    <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                                    <div class="dash-widget-info text-right">
                                        <h3>{{ $totalClientsToday }}</h3>
                                        <span class="widget-title2">Today Clients <i class="fa fa-check"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>





                        </div>


                    </div>


                    <div class="col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>No of Clients (30 Days)</h5>
                                <canvas id="myChart" width="100%" height="75"></canvas>

                            </div>


                        </div>
                    </div>




                </div>












            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var labels = [];
            var data = [];

            @foreach ($clients->groupBy(function ($date) {
        return \Carbon\Carbon::parse($date->created_at)->format('Y-m-d');
    }) as $day => $groupedClients)
                labels.push("{{ $day }}");

                data.push({{ $groupedClients->count() }});
            @endforeach


            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'No of Clients',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
