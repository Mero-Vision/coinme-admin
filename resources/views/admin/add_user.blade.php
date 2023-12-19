<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Add User</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

               
                <form action="{{url('register-account')}}" method="post" enctype="multipart/form-data" class="form-signin">
                    @csrf
                    <div class="account-logo">
                        <a href="{{ url('/register-account') }}"><img src="{{ url('assets/img/logo_transparent.png') }}"
                                alt="Coin Me Logo"></a>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email">
                                 @error('name')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Number<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="id_number">
                                 @error('id_number')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password">
                                 @error('password')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Upload ID card front photo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="frontPhotoInput" name="front_image">
                                <img id="frontPhotoPreview" src="#" alt="Front Photo Preview"
                                    style="max-width: 100px; max-height: 100px; display: none;">
                                     @error('front_image')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Upload ID card back photo<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="backPhotoInput" name="back_image">
                                <img id="backPhotoPreview" src="#" alt="Front Photo Preview"
                                    style="max-width: 100px; max-height: 100px; display: none;">
                                     @error('back_image')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Upload ID card in hand<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="handPhotoInput" name="id_in_hand">
                                <img id="handPhotoPreview" src="#" alt="Front Photo Preview"
                                    style="max-width: 100px; max-height: 100px; display: none;">
                                     @error('id_in_hand')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="form-group checkbox">
                        <label>
                            <input type="checkbox" id="termsCheckbox"> I hereby confirm the accuracy of the provided
                            information.
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" id="signupButton" disabled>Signup</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
    <script>
        $(document).ready(function() {
            // Preview the front photo before uploading
            $("#frontPhotoInput").change(function() {
                readURL(this, '#frontPhotoPreview');
            });
        });

        // Function to read and display the image
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Preview the front photo before uploading
            $("#backPhotoInput").change(function() {
                readURL(this, '#backPhotoPreview');
            });
        });

        // Function to read and display the image
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Preview the front photo before uploading
            $("#handPhotoInput").change(function() {
                readURL(this, '#handPhotoPreview');
            });
        });

        // Function to read and display the image
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Disable signup button by default
            $("#signupButton").prop("disabled", true);

            // Enable signup button when checkbox is checked
            $("#termsCheckbox").change(function() {
                if ($(this).is(":checked")) {
                    $("#signupButton").prop("disabled", false);
                } else {
                    $("#signupButton").prop("disabled", true);
                }
            });
        });
    </script>
    
</body>

</html>
