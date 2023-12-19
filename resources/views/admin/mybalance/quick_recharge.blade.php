<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Quick Recharge</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">


                <div class="row mt-4">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Request a balance to an admin</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{url('admin/quick-recharge')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Recharge Amount</label>
                                <input class="form-control" type="text" name="recharge_amount">
                                @error('recharge_amount')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment Address</label>
                                <input class="form-control" type="text" name="payment_address">
                                @error('payment_address')
                                <span class="text-danger">{{$message}}</span>
                                    
                                @enderror
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Submit For Review</button>
                            </div>
                        </form>

                        <p class="mt-5 text-dark">Do not recharge any of the above addressesUSDTassets,, otherwise the asset will not be recovered.
                    USDTThe coin only supports the simple send method. The use of other methods (send all) is
                    temporarily unable to be credited. Please understand..<br>
                    after you recharge to the above address, you need to confirm the whole network node. after one time
                    of network confirmation, you need to arrive at the account, and after six times of network
                    confirmation, you can withdraw currency.. minimum recharge amount: 10.00000000USDT,
                    recharge less than the minimum amount will not be credited and cannot be returned.<br>
                    your recharge address will not be changed frequently, and you can recharge repeatedly. if there is
                    any change, we will try to notify you through network announcement or email..
                    please make sure that the computer and browser are secure to prevent information from being tampered
                    with or leaked.</p>
                    </div>
                    
                </div>
                


            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
