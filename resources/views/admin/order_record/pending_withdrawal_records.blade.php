<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pending Withdrawal Records</title>
    @include('adminLayouts.header')

</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')
        @include('adminLayouts.sidebar')
        <div class="page-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-sm-12 col-12">
                        <h4 class="page-title">Pending Withdrawal Records</h4>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Wallet Address</th>
                                        <th>Coin Type</th>
                                        <th>Status</th>
                                        <th>Action</th>


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
                    url: '/admin/order/pending-withdrawal-records/data',
                    type: 'GET',
                    dataType: 'json',
                    processing: true,
                    serverSide: true,
                },
                processing: true,

                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        data: "amount",
                        render: function(data, type, row) {
                            return '$ ' + data;
                        }
                    },
                    {
                        "data": "client_wallet_address"
                    },
                    {
                        "data": "coin_type"
                    },
                    {
                        "data": "status"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {

                            return '<button class="btn btn-success btn-sm" onclick="paidStatus(' +
                                row.id + ')">Paid</button> ' +
                                '<button class="btn btn-warning btn-sm" onclick="rejectWithdraw(' + row
                                .id + ')">Reject</button> '

                        }
                    }




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

        function paidStatus(id) {
            if (confirm('Are you sure you want to confirm the amount paid?')) {
                $.ajax({
                    url: '/admin/order/pending-withdrawal-records/status/' + id,
                    type: 'GET',
                    data: {
                        _method: 'GET'
                    },
                    success: function(response) {
                        if (response.status === 'success') {

                            $('#table_data').DataTable().ajax.reload();
                        } else {

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        function rejectWithdraw(id) {
            if (confirm('Are you sure you want to reject this withdraw request and freeze the amount?')) {
                $.ajax({
                    url: '/admin/order/pending-withdrawal-records/reject/' + id,
                    type: 'GET',
                    data: {
                        _method: 'GET'
                    },
                    success: function(response) {
                        if (response.status === 'success') {

                            $('#table_data').DataTable().ajax.reload();
                        } else {

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>




    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
