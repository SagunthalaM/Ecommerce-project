@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper" style="height: 1000px;min-height:100vh;background-color:white;">

    <!DOCTYPE html>
    <html>
    <head>
        <title>All Products</title>
   
    </head>
    <body >
       
      <section style="padding-top:10px">
        @if(Session::has('danger'))
        <div class="alert alert-danger ">
            {{ Session::get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>    
     @endif
      
        <div class="container mb-5">
            <div class="row">
            <div class="col">
            <table id="product" class="table table-striped   table-hover" style="100%" >
            <thead class="table-dark" style="margin-left:10px" >
                <tr>
                    
                    <th>P/Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
               
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
                $('#product').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.products') }}",
                    columns: [
                       // { data: 'DT_RowIndex',name:'DT_RowIndex',orderable:false},
                        { data: 'id', name:'id'},
                       // { data: 'picture', name:'picture'},
                        { data: 'title', name: 'title' },
                        { data: 'price', name: 'price' },
                        { data: 'description', name:'description'},
                       // { data: 'picture',name='picture'},
                        { data: 'actions', name:'actions'}
                      ]
                });
            });
        </script>
    </body>
    </html>
</div>

@endsection