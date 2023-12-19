<div class="header">
    <div class="header-left">
        <a href="{{ url('admin/dashboard') }}" class="logo">
            <img src="{{ url('assets/img/fav.png') }}" width="55" height="35" alt="">
            <span>Coin Me</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">


        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">@php
                    $profileImage = auth()
                        ->user()
                        ->getFirstMediaUrl('profile_image');
                @endphp

                    <img class="rounded-circle" src="{{ $profileImage ? $profileImage : url('assets/img/user.jpg') }}"
                        width="70" alt="Admin">

                    <span class="status online"></span></span>
                <span>Admin</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('admin/profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('admin/profile/edit-profile') }}">Edit Profile</a>
                <a class="dropdown-item" href="{{ url('admin/id_verification') }}">ID Verification</a>
                
                 @if (auth()->user()->status == 'admin')
                    <a class="dropdown-item" href="{{ url('admin/settings') }}">Settings</a>
                    <a class="dropdown-item" href="{{ url('admin/pulse') }}">Analytics</a>
                @endif
                
                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ url('admin/profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ url('admin/profile/edit-profile') }}">Edit Profile</a>
            <a class="dropdown-item" href="{{ url('admin/id_verification') }}">ID Verification</a>
           @if (auth()->user()->status == 'admin')
                <a class="dropdown-item" href="{{ url('admin/settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ url('admin/pulse') }}">Analytics</a>
            @endif
            
            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
        </div>
    </div>
</div>
