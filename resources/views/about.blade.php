<!DOCTYPE html>
<html lang="en">

<head>
    @include('homeLayouts.header')
    <title>Coin Me | About Us</title>

</head>

<body class="home">

    @include('homeLayouts.nav')


    <!-- section -->
    <section class="layout_padding theme_color_bg white_fonts ambess_section">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10 text_align_center">
                    <div class="full">
                        @if (isset($data['about_title']))
                            <h2>{{ $data['about_title'] }}</h2>
                        @else
                            <h2>Coin Me</h2>
                        @endif

                    </div>
                    <div class="full margin_bottom_30">
                        @if (isset($data['about_slogan']))
                            <p class="large_2"><strong>{{ $data['about_slogan'] }}</strong></p>
                        @else
                            <p class="large_2"><strong>Trade Smarter, Trade Faster with CoinMe!</strong></p>
                        @endif


                    </div>
                    <div class="full">
                        @if (isset($data['about_message']))
                            <p class="large_2">{!! $data['about_message'] !!}</p>
                        @else
                            <p class="large_2"><strong>No About Us Message Currently!</strong></p>
                        @endif
                    </div>
                    <div class="full margin_top_30 margin_bottom_20">
                        <p class="center"><a class="signup_bt read_more_bt" href="{{ url('register-account') }}">Sign
                                up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    @include('homeLayouts.footer')
</body>

</html>
