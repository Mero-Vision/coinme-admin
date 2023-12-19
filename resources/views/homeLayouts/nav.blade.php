<header class="header">
    <!-- header top blue -->
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="full">
                        <div class="country_blog">
                            <span>Country language</span>
                            <span>
                                <select>
                                    <option> --Language-- </option>
                                    <option> English (Uk) </option>
                                    <option> Nepali </option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 left_logo_design">
                    <div class="full">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img class="img-responsive"
                                    src="{{ url('assets/img/logo_transparent.png') }}" alt="#"
                                    style="width: 25%" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="full">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                                {
                                    "symbols": [{
                                            "proName": "FX_IDC:EURUSD",
                                            "title": "EUR to USD"
                                        },
                                        {
                                            "proName": "BITSTAMP:BTCUSD",
                                            "title": "Bitcoin"
                                        },
                                        {
                                            "proName": "BITSTAMP:ETHUSD",
                                            "title": "Ethereum"
                                        }
                                    ],
                                    "colorTheme": "light",
                                    "isTransparent": true,
                                    "showSymbolLogo": true,
                                    "locale": "en"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="main_menu_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_menu float-left">
                        <div class="menu">
                            <ul class="clearfix">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li class="active"><a href="{{ url('market') }}">Market</a></li>
                               
                                {{-- <li>
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href="#">- Team</a></li>
                                        <li><a href="#">- Wallets</a></li>
                                        <li><a href="#">- Overview</a></li>

                                    </ul>
                                </li> --}}
                                {{-- <li>
                                    <a href="#">Blog</a>
                                    <ul>
                                        <li><a href="#">- Blog list</a></li>

                                    </ul>
                                </li> --}}
                                <li><a href="{{url('contact-us')}}">Contact</a></li>
                                 <li><a href="{{url('about-us')}}">About Us</a></li>

                                <li><a href="{{ url('/login') }}"
                                        class="btn-danger text-light px-2 justify-content-end">login</a></li>

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
