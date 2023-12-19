<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coin Me | Send Email</title>
    @include('adminLayouts.header')
</head>

<body>
    <div class="main-wrapper">
        @include('adminLayouts.nav')


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{url('admin/dashboard')}}"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title"><a href="{{url('admin/email/compose')}}" class="btn btn-primary btn-block">Compose</a></li>
                        <li class="active">
                            <a href="{{url('admin/email/send-email')}}">Sent Mail</a>
                        </li>
                        <li>
                            <a href="{{url('admin/email/trash')}}">Trash</a>
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">


           <div class="content">

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">View Send Email</h4>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="table_data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Subject</th>
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
    <div class="sidebar-overlay" data-reff=""></div>
    @include('adminLayouts.footer')

    <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                ajax: {
                    url: '/admin/email/send-email/data',
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
                        "data": "email"
                    },
                    {
                        "data": "subject"
                    },
                   
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button class="btn btn-danger btn-sm" onclick="deleteAccess(' +
                                row.id + ')">Trash</button> <button class="btn btn-primary btn-sm" onclick="viewEmail(' +
                                row.id + ')">View</button>';
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
            if (confirm('Are you sure you want to delete this email?')) {
                $.ajax({
                    url: '/admin/email/send-email/data/delete/' + id,
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
    function viewEmail(emailID) {
        var baseUrl = '{{ url("admin/email/send-email/data/view") }}';
        var url = baseUrl + '/' + emailID;

        // Redirect to the constructed URL
        window.location.href = url;
    }
</script>
</body>

</html>
