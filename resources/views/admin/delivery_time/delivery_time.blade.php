<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trade Delivery Time</title>
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
                        <h4 class="page-title">Trade Delivery Time</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ url('admin/delivery-time/create') }}"
                            class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Delivery
                            Time</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Delivery Time</th>
                                        <th>Profit/Loss Margin Percent</th>
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
                    url: '/admin/delivery-time/data',
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
                        data: "delivery_time",
                        render: function(data, type, row) {
                            return data + 's';
                        }
                    },
                    {
                        data: "margin_percent",
                        render: function(data, type, row) {
                            return data + '%';
                        }
                    },
                    {
                        "data": "status"
                    },

                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-danger btn-sm" onclick="deleteAccess(' +
                                row.id + ')">Delete</button> <button class="btn btn-warning btn-sm" onclick="viewDeliveryTime(' +
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
            if (confirm('Are you sure you want to delete this trade delivery time?')) {
                $.ajax({
                    url: '/admin/delivery-time/delete/' + id,
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
        function viewDeliveryTime(deliveryID) {
            var baseUrl = '{{ url('admin/delivery-time/edit/') }}';
            var url = baseUrl + '/' + deliveryID;

            
            window.location.href = url;
        }
    </script>


    <div class="sidebar-overlay" data-reff=""></div>

    @include('adminLayouts.footer')
</body>


<!-- blank-page24:04-->

</html>
