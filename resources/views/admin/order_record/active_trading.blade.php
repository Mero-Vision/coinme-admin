<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trade Profit and Loss Margin Percent</title>
    @include('adminLayouts.header')
    @livewireStyles()

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-sm-6 col-5">
                        <h4 class="page-title">Active Trading</h4>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            @livewire('active-trading')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <div class="sidebar-overlay" data-reff=""></div>

    

    @include('adminLayouts.footer')
    @livewireStyles()
</body>


<!-- blank-page24:04-->

</html>
