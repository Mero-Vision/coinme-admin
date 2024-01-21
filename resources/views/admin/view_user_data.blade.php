<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me {{ $user->name }}</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row mb-5">
                    <div class="text-center d-block mx-auto text-dark">
                        <h4 class="page-title ">Viewing Information for {{ $user->name }}</h4>
                    </div>
                </div>


                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-8 ">

                            <div class="d-block mx-auto text-center mb-5">




                                <img class="inline-block" src="{{ Avatar::create($user->name)->toBase64() }}"
                                    alt="user">



                            </div>


                            <div class="row">
                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">Name:
                                    </h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->name }}</h4>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">Email:
                                    </h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->email }}</h4>
                                </div>

                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">ID
                                        Number:</h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->id_number ?? 'null' }}</h4>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">Address:
                                    </h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->address ?? 'null' }}
                                    </h4>
                                </div>

                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">Gender:
                                    </h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->gender ?? 'null' }}
                                    </h4>
                                </div>

                                <div class="col-sm-6 mt-4">
                                    <h4 class="text-dark"
                                        style="display: inline-block; margin-right: 10px; font-weight: normal;">Mobile
                                        No:
                                    </h4>
                                    <h4 class="text-dark" style="display: inline-block; font-weight: normal;">
                                        {{ $user->mobile_no ?? 'null' }}
                                    </h4>
                                </div>


                            </div>



                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified mt-4">
                                <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1"
                                        data-toggle="tab">Front ID Image</a></li>
                                <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2"
                                        data-toggle="tab">Back ID Image</a></li>
                                <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3"
                                        data-toggle="tab">ID
                                        Hand Image</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-justified-tab1">
                                    @php
                                        $frontImage = $user->getFirstMediaUrl('front_image');
                                    @endphp
                                    <img class="inline-block"
                                        src="{{ $frontImage ? $frontImage : url('assets/img/no_image.jpeg') }}"
                                        alt="user" style="max-width: 250px; max-height: 250px;" />

                                </div>
                                <div class="tab-pane" id="bottom-justified-tab2">
                                    @php
                                        $backImage = $user->getFirstMediaUrl('back_image');
                                    @endphp
                                    <img class="inline-block"
                                        src="{{ $backImage ? $backImage : url('assets/img/no_image.jpeg') }}"
                                        alt="user2" style="max-width: 250px; max-height: 250px;" />
                                </div>
                                <div class="tab-pane" id="bottom-justified-tab3">
                                    @php
                                        $handImage = $user->getFirstMediaUrl('id_in_hand');
                                    @endphp
                                    <img class="inline-block"
                                        src="{{ $handImage ? $handImage : url('assets/img/no_image.jpeg') }}"
                                        alt="user2" style="max-width: 250px; max-height: 250px;" />
                                </div>
                            </div>


                            @if ($user->verification_status == 'unverified')
                                <form class="mt-3" action="{{ url('admin/client/document/approve') }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" value=" {{ $user->id }}" name="user_id" />
                                    <button type="submit" class="btn btn-primary">Approve Document</button>
                                </form>
                            @else
                                <button class="btn btn-primary mt-3"><i class='bx bxs-badge-check'></i> Document
                                    Verified
                                </button>
                            @endif





                        </div>
                        <div class="col-lg-4">

                            <div class="card-box">
                                <h4 class="card-title">Client Wallet Coins</h4>
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item"><a class="nav-link active" href="#solid-rounded-justified-tab1"
                                            data-toggle="tab">USDT</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab2"
                                            data-toggle="tab">BTC</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab3"
                                            data-toggle="tab">ETH</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1">

                                        <h3 class="mt-3" id="usdtBalance">{{ $usdtBalance->balance }}
                                            <span>{{ $usdtBalance->symbol }}</span>
                                        </h3>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2">
                                        <h3 class=" mt-3" id="btcBalance">{{ $btcBalance->balance }}
                                            <span>{{ $btcBalance->symbol }}</span>
                                        </h3>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab3">
                                        <h3 class=" mt-3" id="etcBalance">{{ $etcBalance->balance }}
                                            <span>{{ $etcBalance->symbol }}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>

                </div>



            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
