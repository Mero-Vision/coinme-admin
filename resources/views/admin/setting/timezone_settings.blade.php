<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/summernote-bs4.css') }}">
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-5">
                        <h4 class="page-title">Update System Time-Zone</h4>
                        <form action="{{url('admin/settings/timezone/update')}}" method="POST">
                            @csrf
                            <label for="timezone">Select Timezone:</label>
                            <select name="timezone" id="timezone" class="form-select form-control">
                                @foreach (timezone_identifiers_list() as $timezone)
                                    <option value="{{ $timezone }}"
                                        {{ config('app.timezone') == $timezone ? 'selected' : '' }}>
                                        {{ $timezone }}
                                    </option>
                                @endforeach
                            </select><br>
                            <button type="submit" class="btn btn-primary">Update Timezone</button>
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
    <script src="{{ url('assets/js/summernote-bs4.min.js') }}"></script>
</body>

</html>
