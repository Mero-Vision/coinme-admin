<!DOCTYPE html>
<html lang="en">

<head>
    <title>Withdrawal Records</title>
    @include('adminLayouts.header')

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Coin Withdrawal Record</h4>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                       
                                        <th>Client Name</th>
                                         <th>Email</th>
                                        <th>Amount</th>
                                        <th>Wallet Address</th>
                                        <th>Coin Type</th>
                                       
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
                    url: '/admin/order/withdrawal-records/data',
                    type: 'GET',
                    dataType: 'json',
                    processing: true,
                    serverSide: true,
                },
                processing: true,

                "columns": [
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        data: "amount",
                        render: function(data, type, row) {
                            return '$ '+ data;
                        }
                    },
                     {
                        "data": "client_wallet_address"
                    },
                     {
                        "data": "coin_type"
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
