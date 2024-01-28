<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
    @livewireStyles()
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')



       


        @livewire('chat')






        


@livewireScripts()
        <div class="sidebar-overlay" data-reff=""></div>
        <script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ url('assets/js/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/adminbootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/adminapp.js') }}"></script>
        <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
        
</body>


<!-- blank-page24:04-->

</html>
