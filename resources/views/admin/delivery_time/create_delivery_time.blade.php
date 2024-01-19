<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Time</title>
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
                        <h4 class="page-title">Create Trade Delivery Time</h4>
                    </div>
                </div>
                <br>
                <div class="container">

                    <div class="row">

                        <div class="col-md-8">
                            <form action="{{ url('admin/delivery-time/create') }}" method="post">
                                @csrf



                                <div class="form-group">
                                    <label>Time (Seconds)</label>
                                    <input class="form-control" type="number" name="delivery_time" placeholder="eg: 120">
                                     @error('delivery_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Margin Percent</label>
                                    <select class="form-control" name="margin_percent_id">
                                        @foreach ($marginPercent as $data)
                                            <option value="{{ $data->id }}">{{ $data->margin_percent }}%</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="m-t-20 text-center">
                                    <button type="submit" class="btn btn-primary submit-btn">SUBMIT</button>
                                </div>
                            </form>

                            <div class="container mt-5">
                                <div class="card mx-auto" style="max-width: 600px;">

                                    <div class="card-body text-dark">
                                        <div class="card-title text-center">Important Notice</div>
                                        <p class="mt-3">
                                            Kindly input the delivery time, ensuring that the value entered is in
                                            seconds. Once submitted, the entered value cannot be modified later. Thank
                                            you for your attention to this matter.
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>







                        <div class="col-md-4">
                            <h4 class="text-center">List Of Delivery Time</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deliveryTime as $data)
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->delivery_time }}s</td>
                                        <td>{{ $data->status }}</td>

                                        <tr>
                                        @empty
                                            <td>No Recent Data</td>
                                    @endforelse


                                    </tr>
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

</html>
