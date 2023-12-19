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
                        <h4 class="page-title">Update About Us Details</h4>
                        <form action="{{ url('admin/settings/post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>About (Title)</label>

                                        @if (isset($data['about_title']))
                                            <input type="text" value="{{ $data['about_title'] }}"
                                                class="form-control" name="about_title" />
                                        @else
                                            <input type="text" class="form-control" name="about_title">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>About (Slogan)</label>


                                        @if (isset($data['about_slogan']))
                                            <input type="text" value="{{ $data['about_slogan'] }}"
                                                class="form-control" name="about_slogan" />
                                        @else
                                            <input type="text" class="form-control" name="about_slogan">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>About (Message)</label>


                                        @if (isset($data['about_message']))
                                            <textarea rows="5" cols="5" class="form-control summernote" name="about_message"
                                                placeholder="Enter your message here">{{ $data['about_message'] }}</textarea>
                                        @else
                                            <textarea rows="5" cols="5" class="form-control summernote" name="about_message"
                                                placeholder="Enter your message here"></textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="submit" class="btn btn-primary submit-btn">Update About Us</button>
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
