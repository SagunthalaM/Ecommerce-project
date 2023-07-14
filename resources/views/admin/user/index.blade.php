@extends('backend.layouts.app')
@section('content')


<div class="content-wrapper">

    <!DOCTYPE html>
    <html>
    <head>
        <title>All users</title>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <style>
            .alert {
     position: relative;
     z-index: 1;
}
        </style>
    </head>
    <body>
       
      <section style="padding-top:10px">
       
        @if(session('success'))
      
        <div class="alert alert-warning  alert-dismissible  show " role="alert" style="margin:5px 10px">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endif
       
        <div class="container mb-5">
            <div class="row">
                <div class="col">
                <table id="data" class="table table-striped  table-hover">
            <thead class="table-dark" >
                <tr>
                    <th>Id</th>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
       
        </table>
                </div>
            </div>
        </div>
    
    </section>
    
        <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#data').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.user.index') }}",
                    columns: [
                        { data: 'DT_RowIndex',name:'DT_RowIndex',orderable:false},
                        { data:'id', name:'id'},
                        { data: 'username', name: 'username' },
                        { data: 'email', name: 'email' },
                        { data: 'role', name: 'role' },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                    ]
                });
            });
        </script>
    </body>
    </html>
</div>


@endsection()