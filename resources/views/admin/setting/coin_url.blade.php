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
                        <h4 class="page-title">Set up your coin URL</h4>
                        <form action="{{ url('admin/settings/coin-url') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Coin URL</label>

                                        @if (isset($url['url']))
                                            <input type="text" value="{{ $url['url'] }}"
                                                class="form-control" name="coin_url" />
                                        @else
                                            <input type="text" class="form-control" name="coin_url">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>


                                        @if (isset($url['description']))
                                            <textarea rows="5" cols="5" class="form-control summernote" name="description"
                                                placeholder="Enter your message here">{{ $url['description'] }}</textarea>
                                        @else
                                            <textarea rows="5" cols="5" class="form-control summernote" name="description"
                                                placeholder="Enter your message here"></textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="submit" class="btn btn-primary submit-btn">SUBMIT</button>
                                </div>
                            </div>
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
