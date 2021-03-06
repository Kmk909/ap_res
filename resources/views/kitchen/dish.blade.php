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
                <h3 class="card-title">Dishes available</h3>
                <a href="/dish/create" class="btn btn-success" style="float:right">Create</a>
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
                        <th>Category</th>
                        <th>Created</th>
                        <th>Action</th>
                        
                        
                       </tr>
                      </thead>
                     <tbody>
                       @foreach($dishes as $dish)
                        <tr>
                          <td>{{$dish->name}}</td>
                          <td>{{$dish->category->name}}</td>
                          <td>{{$dish->category->created_at}}</td>
                          <td>
                            <div class="form-row">
                            <a href="{{route('dish.edit',$dish->id)}}" style="height: 40px;margin-right: 10px;" class="btn btn-warning">Edit</a>
                            <form action="{{route('dish.destroy',$dish->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                           <button type="submit" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-danger">Delete</button>
                          </form>
                          </div>                          
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
        "searching":true,
        "pageLength":10,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        
});
});
</script>  