<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
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
                    <div class="col-md-6">
                        <h5>Monthly User Registrations</h5>
                        <canvas id="myChart" width="400" height="400"></canvas>

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

           @foreach($clients->groupBy(function($date) {
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
