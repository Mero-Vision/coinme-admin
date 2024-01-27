<!DOCTYPE html>
<html lang="en">

<head>
    <title>Client Recharge History</title>
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
                        <h4 class="page-title">Client Recharge History</h4>
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
                                         <th>Coin Type</th>
                                        <th>Coin Value</th>
                                        <th>Recharge Amount</th>
                                        <th>Eq. Coin Amount</th>
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
                    url: '/admin/users/recharge-history/data',
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
                        "data": "client_name"
                    },
                     {
                        "data": "coin_type"
                    },
                     {
                        "data": "coin_value"
                    },
                   
                    {
                        data: "recharge_amount",
                        render: function(data, type, row) {
                            return '$ '+ data;
                        }
                    },
                     {
                        "data": "equivalent_coin_amount"
                    },
                     {
                        "data": "status"
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
