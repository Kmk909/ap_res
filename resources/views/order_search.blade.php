<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <css for search box> -->
    <style>
        
    .topnav button {
      float: right;
      padding: 6px;
      border: 1px solid #F8F8FF;
      margin-top: 8px;
      margin-right: 16px;
      margin-bottom: 8px;
      font-size: 17px;
      color: #f8f8f8;
      background-color: #4CAF50;
    }
    .topnav input {
      float: right;
      padding: 6px;
      border: 1px solid #F8F8FF;
      margin-top: 8px;
      margin-right: 16px;
      margin-bottom: 8px;
      font-size: 17px;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css">
        <!-- Data Tables -->
        <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

</head>
<body>
<div class="card">
    
    <div class="card-body">
        
        <h1>Order Form</h1>
        
        @if (session('message'))
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('message') }}</strong> 
            </div>
        @endif
        
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary card-tabs">
                <div class="topnav">
                    <form action="{{route('search')}}" method="get">
                    <div class="topnav1">
                    
                    <button type="submit">Search</button>
                    <input type="text" placeholder="Search.." name="search">
                    </div>
                    </form>
                </div>
            <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
            </li>
            
            </ul>
            
            </div>
            <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            
            <form action="{{route('order.submit')}}" method="post">
                @csrf
                <div class="row">
                    @if($posts->isNotEmpty())
                       @foreach ($posts as $post)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{url('/images/'.$post->image)}}" width=160 height=150 >
                                        <br>
                                        <h3>{{$post->name}}</h3>
                                        
                                        <label for="">Quantity</label>
                                        <input type="number"  name="{{$post->id}}">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else 
                       @foreach($dishes as $dish)
                    
                                <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{url('/images/'.$dish->image)}}" width=160 height=150 >
                                        <br>
                                        <h3>{{$dish->name}}</h3>
                                        
                                        <label for="">Quantity</label>
                                        <input type="number"  name="{{$dish->id}}">
                                        <br>
                                    </div>
                                </div>
                                </div>
                    
                    @endforeach
                    @endif
                
                    </div>
                    <div class="form-group">
                        <label for="">Table Number</label>
                        <select name="table">
                            @foreach($tables as $table)
                                <option class="form-control" value="{{$table->id}}">{{$table->number}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input  style="float:right" type="submit" class="btn btn-success" value="Submit">
            </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <table class="table table-bordered table-striped">
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
                             
                             <a href="{{route('waiter.serve',$order->id)}}"  class="btn btn-warning">Serve</a>
                             <a href="{{route('waiter.cancel',$order->id)}}"  class="btn btn-danger">Cancel</a>
                             <!-- <a href="{{route('kitchen.ready',$order->id)}}"  class="btn btn-success">Ready</a>
                              -->
                                                     
                           </td>
                         
                         </tr>
                        @endforeach
                      </tbody>   
                </table>
            </div>
            
            </div>
            </div>
            </div>
            
            </div>
            </div>
            
    </div>

</div>                
</body>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- Data Tables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

</html>