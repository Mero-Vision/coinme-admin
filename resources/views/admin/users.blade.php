<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Luminex</title>
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
                        <h4 class="page-title">Users</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ url('admin/users/add') }}" class="btn btn-primary float-right btn-rounded"><i
                                class="fa fa-plus"></i> Add Users</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
                    url: '/admin/users/data',
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
                        "data": "mobile_no"
                    },


                    {
                        data: null,
                        render: function(data, type, row) {
                            var freezeButton =
                                '<button class="btn btn-warning btn-sm" onclick="freezeUser(' + row
                                .id + ')">Freeze</button>';

                            if (row.is_frozen=='active') {
                                freezeButton =
                                    '<button class="btn btn-success btn-sm" onclick="unfreezeUser(' +
                                    row.id + ')">Unfreeze</button>';
                            }

                            return '<button class="btn btn-danger btn-sm" onclick="deleteAccess(' +
                                row.id + ')">Delete</button> ' +
                                '<button class="btn btn-primary btn-sm" onclick="viewUser(' + row
                                .id + ')">View</button> ' +
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

        function deleteAccess(user_id) {
            if (confirm('Are you sure you want to delete this user account?')) {
                $.ajax({
                    url: '/admin/users/delete/' + user_id,
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

        function freezeUser(user_id) {
            if (confirm('Are you sure you want to freeze this account?')) {
                $.ajax({
                    url: '/admin/users/freeze/' + user_id,
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

        function unfreezeUser(user_id) {
            if (confirm('Are you sure you want to unfreeze this account?')) {
                $.ajax({
                    url: '/admin/users/unfreeze/' + user_id,
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
        function viewUser(userId) {
            var baseUrl = '{{ url('admin/users/data') }}';
            var url = baseUrl + '/' + userId;

            // Redirect to the constructed URL
            window.location.href = url;
        }

        
    </script>


    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
