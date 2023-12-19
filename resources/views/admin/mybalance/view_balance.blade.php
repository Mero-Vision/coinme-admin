<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | My Balance</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">


                <div class="card-box profile-header border rounded"
                    style="position: relative; overflow: hidden; background: url('{{ asset('assets/img/pattern11.jpeg') }}') center center no-repeat; background-size: cover;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view m-3">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="{{ url('assets/img/fav.png') }}"
                                                alt="" style="object-fit: contain;"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="profile-info-left mx-5">
                                                <h3 class="user-name m-t-0 mb-0 text-light">Coin Me Balance:
                                                    @if ($clientBalance)
                                                        {{ $clientBalance->balance }}
                                                    @else
                                                        0.00000 
                                                    @endif
                                                </h3>
                                                <small class="text-light">User Type:
                                                    {{ auth()->user()->status }}</small>
                                                <div class="staff-id text-light">View Transactions</div>
                                                <div class="staff-msg"><a href="{{ url('admin/quick-recharge') }}"
                                                        class="btn btn-primary">Quick Recharge</a></div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4">
                                            <button class="btn btn-warning">View Profile</button><br><br>
                                            <button class="btn btn-warning">View Verification Cards</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Recent
                                Transactions</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">15 Days
                                Transactions</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">30 Days
                                Transactions</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <h3 class="card-title">Recent Coin Me Transactions</h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Load 12,000 USD</a>
                                                            <div>Deposit</div>
                                                            <span class="time">2023-12-17</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Load 12,000 USD</a>
                                                            <div>Deposit</div>
                                                            <span class="time">2023-12-17</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab2">
                            Tab content 2
                        </div>
                        <div class="tab-pane" id="bottom-tab3">
                            Tab content 3
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
