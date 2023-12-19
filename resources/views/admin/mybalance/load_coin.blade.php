<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Load Coin</title>
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
                        <h4 class="page-title">Load Money to {{$client->name}}</h4>
                    </div>
                </div>
                <br>
                <div class="container">

                    <div class="row">

                        <div class="col-md-8">
                            <form action="{{url('admin/users/load-balance')}}" method="post">
                                @csrf
                                 <input class="form-control" name="client_id" type="hidden" value="{{$client->id}}"
                                       readonly>
                                <input class="form-control" name="recharge_id" type="hidden" value="{{$rechargeRequest->id??null}}"
                                       readonly>


                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input class="form-control" type="text" value="{{$client->name}}"
                                       readonly>
                                </div>

                                <div class="form-group">
                                    <label>Amount Requested</label>
                                    <input class="form-control" type="text" value="{{$rechargeRequest->recharge_amount}}"
                                       readonly>
                                </div>

                                <div class="form-group">
                                    <label>Recharge Amount</label>
                                    <input class="form-control" type="number" name="recharge_amount"
                                        placeholder="Enter amount">

                                    @error('recharge_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Load Amount</button>
                            </div>
                            </form>

                            <div class="container mt-5">
                                <div class="card mx-auto" style="max-width: 600px;">
                                    
                                    <div class="card-body text-dark">
                                        <div class="card-title text-center">Important Notice</div>
                                        <p class="mt-3">
                                           Kindly exercise utmost caution when entering the designated amount 
                                           for the fund loading process. It is imperative to note that once 
                                           the top-up transaction is successfully completed, it cannot be reversed. 
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>







                        <div class="col-md-4">
                            <h4 class="text-center">Recent Top Up</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Top Up Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rechargeHistory as $data)
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->recharge_amount}}</td>
                                         <tr>
                                    @empty
                                    <td>No Recent Top Up Data</td>
                                        
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
