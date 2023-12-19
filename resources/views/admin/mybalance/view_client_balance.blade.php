<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Client Balance</title>
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
                        <h4 class="page-title">Client Balance</h4>
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
                                        <th>Balance</th>
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
                    url: '/admin/users/client-balance/data',
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
                        "data": "balance"
                    },
                    
                    
                    // {
                    //     data: null,
                    //     render: function(data, type, row) {
                    //         return '<button class="btn btn-danger btn-sm" onclick="viewUser(' +
                    //             row.client_id + ')">Load Money</button>';
                    //     }
                    // }


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
    function viewUser(client_id) {
        var baseUrl = '{{ url("admin/users/load-balance") }}';
        var url = baseUrl + '/' + client_id;

        // Redirect to the constructed URL
        window.location.href = url;
    }
</script>


    <div class="sidebar-overlay" data-reff=""></div>
   @include('adminLayouts.footer')
</body>

</html>
