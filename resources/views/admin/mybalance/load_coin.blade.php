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
                        <h4 class="page-title">Load Money to {{ $clientBalance->name }}</h4>
                    </div>
                </div>
                <br>
                <div class="container">

                    <div class="row">

                        <div class="col-md-8">
                            <form action="{{ url('admin/users/load-balance') }}" method="post">
                                @csrf
                                <input class="form-control" name="client_id" type="hidden"
                                    value="{{ $clientBalance->user_id }}" readonly>


                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input class="form-control" type="text" name="client_name" value="{{ $clientBalance->name }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Select Currency</label>
                                    <select id="coinSelector" class="form-control" name="currency_id"
                                        onchange="updateCoinValue()">
                                        @foreach ($currency as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Current Value</label>
                                    <input id="coinValueInput" name="coin_value" type="text" class="form-control" readonly>
                                </div>



                                <div class="form-group">
                                    <label>Recharge Amount</label>
                                    <input class="form-control" type="number" id="rechargeAmountInput"
                                        name="recharge_amount" placeholder="Enter amount in $">

                                    @error('recharge_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Equivalent Coin Amount</label>
                                    <input id="equivalentCoinAmountInput" name="equivalent_coin_amount" class="form-control" type="text" readonly>
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
                            <h4 class="text-center">Wallet Verification Image</h4>
                            <img src="{{ $clientBalance->getFirstMediaUrl('verification_image') }}"
                                style="max-width: 100%" />

                        </div>



                    </div>



                </div>





            </div>

        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        const coinSelector = $('#coinSelector');
        const rechargeAmountInput = $('#rechargeAmountInput');
        const equivalentCoinAmountInput = $('#equivalentCoinAmountInput');
        const coinValueInput = $('#coinValueInput');

        let debounceTimer;

        function updateCoinValue() {
            const selectedCoin = coinSelector.val();
            const rechargeAmountUSD = Number(rechargeAmountInput.val());

            if (isNaN(rechargeAmountUSD)) {
                console.error('Invalid recharge amount:', rechargeAmountInput.val());
                return;
            }

            $.get("/get-coin-price", { coin: selectedCoin })
                .done(function(data) {
                    try {
                        const currentCoinValue = Number(data.currentCoinValue);

                        if (!isNaN(currentCoinValue)) {
                            const roundedCoinValue = currentCoinValue.toFixed(4);
                            const equivalentCoinAmount = (rechargeAmountUSD / currentCoinValue).toFixed(4);

                           
                            equivalentCoinAmountInput.val(equivalentCoinAmount);
                            coinValueInput.val(roundedCoinValue);
                        } else {
                            console.error('Invalid coin value received:', data.currentCoinValue);
                        }
                    } catch (error) {
                        console.error('Error updating coin value:', error);
                    }
                })
                .fail(function(error) {
                    console.error('Failed to fetch coin price:', error.responseText);
                });
        }

        function debouncedUpdateCoinValue() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(updateCoinValue, 500);
        }

        
        setInterval(updateCoinValue, 1000);

        // Initial call to updateCoinValue
        updateCoinValue();

        // Debounce input to reduce API calls
        rechargeAmountInput.on('input', debouncedUpdateCoinValue);
    });
</script>






    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
