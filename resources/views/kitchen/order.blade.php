@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Panel</h1>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders Listings</h3>
                
              </div>
                
              <div class="card-body">
                @if (session('message'))
                  <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session('message') }}</strong> 
                  </div>
                @endif
                     <table id="dishes" class="table table-bordered table-striped">
                      <thead>
                       <tr>
                        <th>Dish Name</th>
                        <th>Table Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                        
                        
                       </tr>
                      </thead>
                     <tbody>
                       @foreach($orders as $order)
                        <tr>
                          <td>{{$order->dish->name}}</td>
                          <td>{{$order->table_id}}</td>
                          <td>{{$status[$order->status]}}</td>
                          <td>
                            
                            <a href="/order/{{$order->id}}/approve"  class="btn btn-warning">Approve</a>
                            <a href="/order/{{$order->id}}/cancel"  class="btn btn-danger">Cancel</a>
                            <a href="/order/{{$order->id}}/ready"  class="btn btn-success">Ready</a>
                            
                                                    
                          </td>
                        
                        </tr>
                       @endforeach
                     </tbody>        
                     </table>
                     </div>
                    </div>
                </div>
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script>
$(function () {
$('#dishes').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching":false,
        "pageLength":10,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        
});
});
</script>  