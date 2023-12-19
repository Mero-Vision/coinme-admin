<!DOCTYPE html>
<html lang="en">

<head>
    @include('homeLayouts.header')
    <title>Coin Me</title>

</head>

<body class="home">

    @include('homeLayouts.nav')

    <!-- slider -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('assets/img/slider1.png') }}" alt="Los Angeles" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/img/slider2.png') }}" alt="Chicago" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/img/slider3.png') }}" alt="New York" width="1100" height="500">
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
    <!-- slider -->
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [{
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "US 100"
                    },
                    {
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
                "showSymbolLogo": true,
                "colorTheme": "light",
                "isTransparent": true,
                "displayMode": "adaptive",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->
    <!-- section -->
    <div class="running_stock">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div id="logo-ticker">
                            <div class="footer-logo-slider">
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci2.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci3.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci4.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci5.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci6.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci7.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci8.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci9.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci10.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci11.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci21.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci22.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci23.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci24.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci25.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci26.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci27.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci28.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci29.png') }}" alt=""></li>
                                </ul>
                                <ul class="footer-logo">
                                    <li><img src="{{ url('assets/img/ci30.png') }}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="layout_padding map_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2>Get <span class="theme_color">Started</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text_align_center">
                    <div class="full">
                        <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium<br>doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon1_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>BETTER THAN A CREDIT CARD</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon3_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>SAFE & SECURE</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon2_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>MOBILE APP</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon4_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>BETTER THAN CASH</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon5_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>INSTANT EXCHANGE</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full icons text_align_center">
                        <img src="{{ url('assets/img/icon6_.png') }}" width="75" alt="#" />
                    </div>
                    <div class="full text_align_center">
                        <h4>FASTER SETTLEMENT</h4>
                    </div>
                </div>
            </div>
            <div class="row margin_top_50">
                <div class="col-md-6">
                    <div class="btcwdgt-chart"></div>
                </div>
                <div class="col-md-6">
                    <div class="btcwdgt-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <section class="layout_padding dark_layer_2">
        <div class="container">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div class="full margin_bottom_20">
                        <div class="center">
                            <h3>Looking for a First-Class Cryptocurrency Expert ?</h3>
                        </div>
                    </div>
                    <div class="full opacity_5">
                        <div class="center">
                            <p class="large_2" style="color: #000000;">Sed ut perspiciatis unde omnis iste natus error
                                sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                explicabo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    
    <!-- section -->
    <div class="layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2>Why choose <span class="theme_color">Us</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 margin_top_50">
                    <div class="full feature_b1 text_align_center">
                        <div class="icon full">
                            <img src="{{ url('assets/img/f2.png') }}" alt="#">
                        </div>
                        <div class="full">
                            <h4>Fast Transaction</h4>
                        </div>
                        <div class="full">
                            <p>Optimize your business case with blockchain technology and Smart Contracts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 margin_top_50">
                    <div class="full feature_b1 text_align_center">
                        <div class="icon full">
                            <img src="{{ url('assets/img/f3.png') }}" alt="#">
                        </div>
                        <div class="full">
                            <h4>24/7 Trading</h4>
                        </div>
                        <div class="full">
                            <p>Optimize your business case with blockchain technology and Smart Contracts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 margin_top_50">
                    <div class="full feature_b1 text_align_center">
                        <div class="icon full">
                            <img src="{{ url('assets/img/f1.png') }}" alt="#">
                        </div>
                        <div class="full">
                            <h4>Free Consulting</h4>
                        </div>
                        <div class="full">
                            <p>Optimize your business case with blockchain technology and Smart Contracts.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <section class="layout_padding video_bg_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2>Crypto currency is <span class="theme_color"><br>future of digital money</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="full margin_top_30">
                        <div class="full_main_video">
                            <img src="{{ url('assets/img/video.png') }}" class="img-responsive" alt="#" />
                            <div class="playpause"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->


    <!-- section -->
    <div class="layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="tabbar">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" href="#tab1" role="tab"
                                        data-toggle="tab">Currencyzen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" role="tab" data-toggle="tab">BTP Pay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab3" role="tab" data-toggle="tab">BTP
                                        Bazaar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab4" role="tab" data-toggle="tab">Explorer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab5" role="tab" data-toggle="tab">Download</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="full">
                                                <img class="img-responsive" src="{{ url('assets/img/bost3.jpg') }}"
                                                    alt="#" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="full">
                                                <h3>Let’s change the world together..</h3>
                                            </div>
                                            <div class="full">
                                                <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit
                                                    volup tatem accusantium doloremque laudantium</p>
                                            </div>
                                            <div class="full used_payment">
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Paypal</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bank Account</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Deposit</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Credit/Debit Card</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Payment for goods</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Competitive Mining
                                                    </li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> From Someone Near</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bitcoin Exchange</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="full">
                                                <img class="img-responsive" src="{{ url('assets/img/bost2.jpg') }}"
                                                    alt="#" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="full">
                                                <h3>Let’s change the world together..</h3>
                                            </div>
                                            <div class="full">
                                                <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit
                                                    volup tatem accusantium doloremque laudantium</p>
                                            </div>
                                            <div class="full used_payment">
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Paypal</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bank Account</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Deposit</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Credit/Debit Card</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Payment for goods</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Competitive Mining
                                                    </li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> From Someone Near</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bitcoin Exchange</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab3">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="full">
                                                <img class="img-responsive" src="{{ url('assets/img/bost1.jpg') }}"
                                                    alt="#" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="full">
                                                <h3>Let’s change the world together..</h3>
                                            </div>
                                            <div class="full">
                                                <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit
                                                    volup tatem accusantium doloremque laudantium</p>
                                            </div>
                                            <div class="full used_payment">
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Paypal</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bank Account</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Deposit</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Credit/Debit Card</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Payment for goods</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Competitive Mining
                                                    </li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> From Someone Near</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bitcoin Exchange</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab4">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="full">
                                                <img class="img-responsive" src="{{ url('assets/img/bost3.jpg') }}"
                                                    alt="#" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="full">
                                                <h3>Let’s change the world together..</h3>
                                            </div>
                                            <div class="full">
                                                <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit
                                                    volup tatem accusantium doloremque laudantium</p>
                                            </div>
                                            <div class="full used_payment">
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Paypal</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bank Account</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Deposit</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Credit/Debit Card</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Payment for goods</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Competitive Mining
                                                    </li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> From Someone Near</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bitcoin Exchange</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab5">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="full">
                                                <img class="img-responsive" src="{{ url('assets/img/bost2.jpg') }}"
                                                    alt="#" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="full">
                                                <h3>Let’s change the world together..</h3>
                                            </div>
                                            <div class="full">
                                                <p class="large_2">Sed ut perspiciatis unde omnis iste natus error sit
                                                    volup tatem accusantium doloremque laudantium</p>
                                            </div>
                                            <div class="full used_payment">
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Paypal</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bank Account</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Deposit</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Credit/Debit Card</li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Payment for goods</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Competitive Mining
                                                    </li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> From Someone Near</li>
                                                    <li><i class="fa fa-arrow-circle-right"></i> Bitcoin Exchange</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
<script src="https://www.cryptohopper.com/widgets/js/script"></script>
    @include('homeLayouts.footer')
</body>

</html>
