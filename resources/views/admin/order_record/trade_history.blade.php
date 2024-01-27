<!DOCTYPE html>
<html lang="en">

<head>
    <title>Client Trade Records History</title>
    @include('adminLayouts.header')

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-sm-6 col-6">
                        <h4 class="page-title">Client Trade Records History</h4>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                       <th>Client ID</th>
                                        <th>Name</th>
                                        <th>Coin</th>
                                         <th>Trade Type</th>
                                        <th>Delivery Time</th>
                                        <th>Purchase Amount</th>
                                        <th>Purchase Price</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                ajax: {
                    url: '/admin/trading/trade-history/data',
                    type: 'GET',
                    dataType: 'json',
                    processing: true,
                    serverSide: true,
                },
                processing: true,

                "columns": [
                    {
                        "data": "client_id"
                    },
                    {
                        "data": "name"
                    },
                     {
                        "data": "coin"
                    },
                     {
                        "data": "trade_type"
                    },
                    {
                        data: "delivery_time",
                        render: function(data, type, row) {
                            return data+'s';
                        }
                    },
                     {
                        "data": "purchase_amount"
                    },
                   
                   
                     {
                        "data": "purchase_price"
                    },
                     {
                        "data": "trade_status"
                    },
                    
                    
                   


                ],
                order: [
                    [0, 'desc']
                ],
                "dom": 'Bfrtip',
                "buttons": [{
                        "extend": 'copyHtml5',
                        "title": 'Data'
                    },
                    {
                        "extend": 'excelHtml5',
                        "title": 'Data'
                    },
                    {
                        "extend": 'csvHtml5',
                        "title": 'Data'
                    },
                    {
                        "extend": 'pdfHtml5',
                        "title": 'Data'
                    },
                    {
                        "extend": 'print',
                        "title": 'Print'
                    }
                ]
            });
        });

       
    </script>

   


    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
