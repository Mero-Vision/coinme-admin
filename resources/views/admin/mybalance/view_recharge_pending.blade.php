<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Luminex | Recharge Pending List</title>
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
                        <h4 class="page-title">Load Money To Users</h4>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
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
                    url: '/admin/users/view-recharge-pending/data',
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
                        "data": "phone_no"
                    },

                    {
                        data: null,
                        render: function(data, type, row) {
                             var freezeButton =
                                '<button class="btn btn-warning btn-sm" onclick="reject(' + row
                                .id + ')">Reject</button>';

                          
                            
                            return '<button class="btn btn-danger btn-sm" onclick="viewUser(' +
                                row.id + ')">Load Money</button>  ' +
                                 freezeButton;
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

        function deleteAccess(id) {
            if (confirm('Are you sure you want to delete this contact?')) {
                $.ajax({
                    url: '/admin/contact_us/data/delete/' + id,
                    type: 'GET',
                    data: {
                        _method: 'DELETE'
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

         function accept(user_id) {
            if (confirm('Are you sure you want to accept this verification?')) {
                $.ajax({
                    url: '/admin/client-recharge/accept/' + user_id,
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

        function reject(user_id) {
            if (confirm('Are you sure you want to reject this client recharge verification?')) {
                $.ajax({
                    url: '/admin/client-recharge/reject/' + user_id,
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

    <script>
        function viewUser(client_id) {
            var baseUrl = '{{ url('admin/users/load-balance') }}';
            var url = baseUrl + '/' + client_id;

            // Redirect to the constructed URL
            window.location.href = url;
        }
    </script>


    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')
</body>

</html>
