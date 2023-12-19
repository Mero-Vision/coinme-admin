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
                <div class="profile-img-wrap mx-5">

                    @php
                        $profileImage = $user->getFirstMediaUrl('profile_image');
                    @endphp


                    <img class="inline-block" src="{{ $profileImage ? $profileImage : url('assets/img/user.jpg') }}"
                        alt="user">

                </div>
                <div class="row mt-3">
                    <div class="col-lg-8 offset-lg-2">


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
                                    style="display: inline-block; margin-right: 10px; font-weight: normal;">Mobile No:
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
                            <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">ID
                                    Hand Image</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="bottom-justified-tab1">
                                @php
                                    $frontImage = $user->getFirstMediaUrl('front_image');
                                @endphp
                                <img class="inline-block"
                                    src="{{ $frontImage ? $frontImage : url('assets/img/no_image.jpeg') }}" alt="user"
                                    style="max-width: 250px; max-height: 250px;" />

                            </div>
                            <div class="tab-pane" id="bottom-justified-tab2">
                                @php
                                    $backImage = $user->getFirstMediaUrl('back_image');
                                @endphp
                                <img class="inline-block"
                                    src="{{ $backImage ? $backImage : url('assets/img/no_image.jpeg') }}" alt="user2"
                                    style="max-width: 250px; max-height: 250px;" />
                            </div>
                            <div class="tab-pane" id="bottom-justified-tab3">
                                 @php
                                    $handImage = $user->getFirstMediaUrl('id_in_hand');
                                @endphp
                                <img class="inline-block"
                                    src="{{ $handImage ? $handImage : url('assets/img/no_image.jpeg') }}" alt="user2"
                                    style="max-width: 250px; max-height: 250px;" />
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
