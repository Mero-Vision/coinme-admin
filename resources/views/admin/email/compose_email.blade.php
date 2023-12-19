<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/summernote-bs4.css')}}">
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home back-icon"></i> <span>Back to
                                    Home</span></a>
                        </li>
                        <li>
                            <a href="{{url('admin/email/send-email')}}">Sent Mail</a>
                        </li>
                        <li>
                            <a href="{{url('admin/email/trash')}}">Trash</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content">


                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Compose</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <form action="{{url('admin/email/compose')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" placeholder="To" name="email" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Subject" name="subject" class="form-control">
                                     @error('subject')
                                    <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea rows="8" cols="5" class="form-control summernote" name="message" placeholder="Enter your message here"></textarea>
                                     @error('message')
                                    <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <div class="text-center compose-btn">
                                        <button class="btn btn-primary"><span>Send</span> <i
                                                class="fa fa-send m-l-5"></i></button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
    <script src="{{url('assets/js/summernote-bs4.min.js')}}"></script>
</body>

</html>
