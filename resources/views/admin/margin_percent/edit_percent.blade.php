<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Margin Percent</title>
    @include('adminLayouts.header')

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-sm-6 col-5">
                        <h4 class="page-title">Edit Margin Percent</h4>
                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('admin/trading/margin-percent/edit') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$marginPercent->id}}" name="margin_id"/>
                        <div class="form-group">
                            <label>Margin Percent (%)<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="margin_percent" value="{{$marginPercent->margin_percent}}">
                            @error('margin_percent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>






            </div>

        </div>
    </div>




    <div class="sidebar-overlay" data-reff=""></div>



    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
