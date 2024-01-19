<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trade Profit and Loss Margin Percent</title>
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
                        <h4 class="page-title">Trade Profit and Loss Margin Percent</h4>
                    </div>
                    <div class="col-sm-6 col-7 text-right m-b-20">
                        <a href="{{ url('admin/delivery-time/create') }}"
                            class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Delivery
                            Time</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Margin Percent</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($marginPercent as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->margin_percent}}</td>
                                    </tr>
                                        
                                    @empty
                                          <tr>
                                    <td colspan="5">
                                        <img src="{{ url('assets/img/No data-rafiki.png') }}"
                                            class="img-fluid d-block mx-auto" style="max-width: 300px" />
                                    </td>
                                </tr>
                                        
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
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
