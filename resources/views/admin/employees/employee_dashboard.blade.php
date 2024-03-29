<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee Dashboard</title>
    @include('adminLayouts.header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">


                <div class="row">
                    <!-- First column -->
                    <div class="col-sm-6">
                        <div class="card p-3">

                            <label class="h4 m-4"><i class='bx bx-sun bx-md text-warning'></i> <span
                                    id="greeting"></span>,
                                {{ auth()->user()->name }}</label><br>


                            <div class="row align-items-center mt-4 mb-4">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-4 text-center pr-3" style="border-right: 1px solid #ccc;">
                                    <a href="{{url('admin/employees/view-employees')}}"
                                        class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user bx-md text-primary'></i><br>
                                        View Employees</a>
                                </div><br>

                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" style="border-right: 1px solid #ccc;">
                                    <a href="{{url('admin/employees/add-employees')}}"
                                        class="text-dark bx-flashing-hover">
                                         <i class='bx bx-user bx-md text-primary'></i><br>
                                        Add Employees</a>
                                </div>
                                <!-- Second column -->
                                <div class="col-4 text-center pl-3">
                                    <a href=""
                                        class="text-dark bx-flashing-hover">
                                         <i class='bx bx-user bx-md text-primary'></i><br>
                                        Employees Salary</a>
                                </div>
                            </div>


                            <div class="row align-items-center mt-4 mb-4">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-4 text-center pr-3" style="border-right: 1px solid #ccc;">
                                    <a href=""
                                        class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user bx-md text-primary'></i><br>
                                        Attendance</a>
                                </div><br>

                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" style="border-right: 1px solid #ccc;">
                                    <a href=""
                                        class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user bx-md text-primary'></i><br>
                                       Top Deposits</a>
                                </div>
                                <!-- Second column -->
                                <div class="col-4 text-center pl-3">
                                    <a href="https://naindrarajphago.com.np/admin/profile"
                                        class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user bx-md text-primary'></i><br>
                                        Restore Employee</a>
                                </div>
                            </div>

                        </div>






                    </div>

                    <!-- Second column -->
                    <div class="col-sm-6">
                        <div class="card p-3">
                            <h4>Today's Weather</h4>
                            <div class="weather-card" id="todayWeather"></div>
                        </div>
                    </div>
                </div>




                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">


                                <div class="row align-items-center mt-2">
                                    <!-- First column with a vertical line on the right side -->
                                    <div class="col-6 col-sm-3 text-center pr-3  mt-3 "
                                        style="border-right: 1px solid #ccc;">
                                        <a class="text-dark">
                                            <i class='bx bx-user bx-md text-primary'></i><br>
                                            Total Employees</a><br>
                                        <label class="text-dark">{{$employees}}</label>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-6 col-sm-3 text-center pr-3  mt-3 "
                                        style="border-right: 1px solid #ccc;">
                                        <a class="text-dark">
                                            <i class='bx bx-trending-up bx-md text-primary'></i><br>
                                            Today Deposit</a><br>
                                        <label class="text-dark" id="formatted-teaprofit">$ 0</label>

                                    </div>
                                    <!-- Second column -->
                                    <div class="col-6 col-sm-3 text-center pr-3  mt-3 "
                                        style="border-right: 1px solid #ccc;">
                                        <a class="text-dark">
                                            <i class='bx bx-trending-up bx-md text-primary'></i><br>
                                            Yesterday Deposit</a><br>
                                        <label id="formatted-teaincome" class="text-dark">$ 0</label>


                                    </div>
                                    <!-- Second column -->
                                    <div class="col-6 col-sm-3 text-center pr-3  mt-3 ">
                                        <a class="text-dark">
                                            <i class='bx bx-trending-up bx-md text-primary'></i><br>
                                            30 Days Deposit</a><br>
                                        <label id="formatted-exp" class="text-dark">$ 0</label>
                                    </div>
                                </div>


                                <br><br>
                                <div class="row align-items-center  mb-2">
                                    <!-- First column with a vertical line on the right side -->
                                    <div class="col-6 col-sm-3 text-center pr-3 mt-3 "
                                        style="border-right: 1px solid #ccc;">
                                        <a class="text-dark">
                                            <i class='bx bx-user bx-md text-primary'></i><br>
                                            Employee of the today</a><br>
                                        <label id="formatted-emp-exp" class="text-dark">---</label>
                                    </div>

                                   
                                </div>




                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var greetingElement = document.getElementById("greeting");
            var currentTime = new Date();
            var currentHour = currentTime.getHours();

            if (currentHour >= 5 && currentHour < 12) {
                greetingElement.textContent = "Good Morning";
            } else if (currentHour >= 12 && currentHour < 15) {
                greetingElement.textContent = "Good Afternoon";
            } else {
                greetingElement.textContent = "Good Evening";
            }
        });
    </script>

    <script>
        // Replace 'YOUR_API_KEY' with your actual OpenWeatherMap API key
        const apiKey = '86cd5d2209dbd1a831f7e0d53c09d4cb';

        // Fetch user's current location using Geolocation API
        navigator.geolocation.getCurrentPosition(position => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Fetch city name based on coordinates using reverse geocoding
            fetch(
                    `https://api.openweathermap.org/geo/1.0/reverse?lat=${latitude}&lon=${longitude}&limit=1&appid=${apiKey}`
                )
                .then(response => response.json())
                .then(data => {
                    const city = data[0].name;
                    fetchWeather(city);
                })
                .catch(error => {
                    console.error('Error fetching city:', error);
                    document.getElementById('todayWeather').textContent = 'Error fetching city.';
                });
        });

        // Function to fetch weather for a given city
        function fetchWeather(city) {
            // Fetch the weather forecast data from OpenWeatherMap API
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                    // Extract today's weather from the API response
                    const todayWeather = {
                        weatherDescription: data.weather[0].description,
                        temperatureKelvin: data.main.temp,
                        iconCode: data.weather[0].icon,
                    };
                    displayTodayWeather(todayWeather);
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    document.getElementById('todayWeather').textContent = 'Error fetching weather data.';
                });
        }

        // Function to display today's weather information
        function displayTodayWeather(weatherData) {
            const element = document.getElementById('todayWeather');
            const date = new Date().toDateString();
            const temperatureCelsius = (weatherData.temperatureKelvin - 273.15).toFixed(2);

            // Get the corresponding weather icon from BoxIcons
            const weatherIcon = getWeatherIcon(weatherData.iconCode);

            element.innerHTML = `
            <p><strong>${date}</strong></p>
            <p class="weather-icon">${weatherIcon}</p>
            <p>Weather: ${capitalizeFirstLetter(weatherData.weatherDescription)}</p>
            <p>Temperature: ${temperatureCelsius}°C</p>
        `;
        }

        // Function to get the corresponding weather icon from BoxIcons
        function getWeatherIcon(iconCode) {
            // Map the icon code to the corresponding BoxIcons weather icon
            switch (iconCode) {
                case '01d':
                    return '<i class="bi bi-sun"></i>';
                case '01n':
                    return '<i class="bi bi-moon"></i>';
                case '02d':
                    return '<i class="bi bi-cloud-sun"></i>';
                case '02n':
                    return '<i class="bi bi-cloud-moon"></i>';
                case '03d':
                case '03n':
                    return '<i class="bi bi-cloud"></i>';
                case '04d':
                case '04n':
                    return '<i class="bi bi-cloudy"></i>';
                case '09d':
                case '09n':
                    return '<i class="bi bi-cloud-rain"></i>';
                case '10d':
                case '10n':
                    return '<i class="bi bi-cloud-drizzle"></i>';
                case '11d':
                case '11n':
                    return '<i class="bi bi-cloud-lightning-rain"></i>';
                case '13d':
                case '13n':
                    return '<i class="bi bi-snow"></i>';
                case '50d':
                case '50n':
                    return '<i class="bi bi-cloud-haze"></i>';
                default:
                    return '<i class="bi bi-question"></i>';
            }
        }

        // Function to capitalize the first letter of a string
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>



    <style>
        /* Add some styles for better presentation */
        .weather-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .weather-icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .weather-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>

    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
