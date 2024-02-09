<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frozen Account User Records</title>
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
                        <h4 class="page-title">Frozen Account Users</h4>
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
                                        <th>Frozen Amount</th>
                                        <th>Currency</th>
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
                    url: '/admin/frozen-account/view/data',
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
                        "data": "username"
                    },
                    {
                        data: "frozen_amount",
                        render: function(data, type, row) {
                            return '$ ' + data;
                        }
                    },
                    {
                        "data": "name"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {

                            return '<button class="btn btn-danger btn-sm" onclick="viewUser(' +
                                row.id + ')">Load Money</button> '
                               

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

       
    </script>

     <script>
        function viewUser(id) {
            var baseUrl = '{{ url('admin/frozen-account/load-frozen-amount') }}';
            var url = baseUrl + '/' + id;

            // Redirect to the constructed URL
            window.location.href = url;
        }

        
    </script>




    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
