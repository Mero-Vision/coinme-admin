<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Client ID Verification</h4>
                    </div>
                </div>

                @if (auth()->user()->getMedia('front_image')->isNotEmpty())
                   <ul class="nav nav-tabs nav-tabs-bottom nav-justified mt-4">
                    <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1" data-toggle="tab">Front
                            ID Image</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-toggle="tab">Back ID
                            Image</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">Selfie with ID card</a></li>
                </ul>
               
                <div class="tab-content">
                    
                        <div class="tab-pane show active" id="bottom-justified-tab1">
                            @php
                                $frontImage = auth()
                                    ->user()
                                    ->getFirstMediaUrl('front_image');
                            @endphp
                            @if ($frontImage)
                                <img class="inline-block" src="{{ $frontImage }}" alt="user"
                                    style="max-width: 250px; max-height: 250px;" />
                            @else
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Upload ID card front photo<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" id="frontPhotoInput"
                                            name="front_image">
                                        <img id="frontPhotoPreview" src="#" alt="Front Photo Preview"
                                            style="max-width: 100px; max-height: 100px; display: none;">
                                        @error('front_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif


                        </div>
                        <div class="tab-pane" id="bottom-justified-tab2">
                            @php
                                $backImage = auth()
                                    ->user()
                                    ->getFirstMediaUrl('back_image');
                            @endphp
                            <img class="inline-block"
                                src="{{ $backImage ? $backImage : url('assets/img/no_image.jpeg') }}" alt="user2"
                                style="max-width: 250px; max-height: 250px;" />
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab3">
                            @php
                                $handImage = auth()
                                    ->user()
                                    ->getFirstMediaUrl('id_in_hand');
                            @endphp
                            <img class="inline-block"
                                src="{{ $handImage ? $handImage : url('assets/img/no_image.jpeg') }}" alt="user2"
                                style="max-width: 250px; max-height: 250px;" />
                        </div>
                        
                </div>
                @else

                <form action="{{ url('admin/id_verification') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>ID Number<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="id_number">
                                @error('id_number')
                                    <span class="text-danger">{{ $message }}</span>
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
                                    <span class="text-danger">{{ $message }}</span>
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
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Selfie Holding Your ID<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="handPhotoInput" name="id_in_hand">
                                <img id="handPhotoPreview" src="#" alt="Front Photo Preview"
                                    style="max-width: 100px; max-height: 100px; display: none;">
                                @error('id_in_hand')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary">Upload Image</button>
                </form>
                   
                @endif
                


                


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
</body>

</html>
