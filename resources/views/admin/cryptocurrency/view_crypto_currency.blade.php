<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Contact Us Management</title>
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
                        <h4 class="page-title">View Crypto Currency Data</h4>
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
                                        <th>Symbol</th>
                                        <th>Price</th>
                                        <th>Market Capital</th>
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
                    url: '/admin/crypto-currency/data',
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
                        "data": "symbol"
                    },
                     {
                        "data": "price"
                    },
                     {
                        "data": "market_capital"
                    },
                    
                    
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-danger btn-sm" onclick="deleteAccess(' +
                                row.id + ')">Delete</button> <button class="btn btn-success btn-sm" onclick="viewUser(' +
                                row.id + ')">Edit</button>';
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
            if (confirm('Are you sure you want to delete this crypto currency?')) {
                $.ajax({
                    url: '/admin/crypto-currency/delete/' + id,
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
    </script>

     <script>
    function viewUser(cryptoID) {
        var baseUrl = '{{ url("admin/crypto-currency/edit") }}';
        var url = baseUrl + '/' + cryptoID;

        // Redirect to the constructed URL
        window.location.href = url;
    }
</script>


    <div class="sidebar-overlay" data-reff=""></div>
   @include('adminLayouts.footer')
</body>

</html>
