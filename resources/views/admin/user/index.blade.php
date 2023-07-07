@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper.Contains page content -->

<div class="content-wrapper">

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <!-- Add user button -->
                <a href="{{ URL::to('admin/add-user') }}" class='btn btn-primary text-white mb-3'>Add User</a>
              
              <table id="example1" class="table table-hover table-bordered ">
                <thead class="table-dark">
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th> Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $row)
                    
                  <tr>
                    <td>{{ $row->id}}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>
                      <a href="{{ URL::to('admin/edit-user/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{ URL::to('admin/delete-user/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                   
                    </td>
                  </tr>
                  @endforeach
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  @endsection