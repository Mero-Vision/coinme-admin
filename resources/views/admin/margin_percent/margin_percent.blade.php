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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Add New Margin Percent
                        </button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($marginPercent as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->margin_percent }}%</td>
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

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Trade Profit and Loss Margin Percent</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{url('admin/trading/margin-percent')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Margin Percent (%)<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="margin_percent">
                            @error('margin_percent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
