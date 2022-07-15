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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
                
              <div class="card-body">
                     <table id="dishes" class="table table-bordered table-striped">
                      <thead>
                       <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                       </tr>
                      </thead>
                     <tbody>
                        <tr>
                        <td>Something</td>
                        <td>in</td>
                        <td>the</td>
                        <td>way</td>
                        <td>!</td>
                        </tr>
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
<script>
$(function () {
$('#dishes').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
});
});
</script>  