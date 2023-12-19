<!DOCTYPE html>
<html lang="en">

<head>
    @include('homeLayouts.header')
    <title>Coin Me | Market</title>

</head>

<body class="home">

    @include('homeLayouts.nav')


    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container d-block mx-auto m-4">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
            {
                "width": "100%",
                "height": "590",
                "defaultColumn": "overview",
                "screener_type": "crypto_mkt",
                "displayCurrency": "BTC",
                "colorTheme": "light",
                "locale": "en",
                "isTransparent": true
            }
        </script>
    </div>
    <!-- TradingView Widget END -->

    @include('homeLayouts.footer')
</body>

</html>
