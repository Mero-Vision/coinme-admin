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

                <div class="row mt-5">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Update {{ $crypto->name }} Data</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ url('admin/crypto-currency/update') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $crypto->id }}" name="id" readonly>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Crypto Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{ $crypto->name }}"
                                            name="name" readonly>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Symbol<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{ $crypto->symbol }}"
                                            name="symbol" readonly>
                                        @error('symbol')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{ $crypto->price }}"
                                            name="price">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Market Capital<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{ $crypto->market_capital }}"
                                            name="market_capital">
                                        @error('market_capital')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
