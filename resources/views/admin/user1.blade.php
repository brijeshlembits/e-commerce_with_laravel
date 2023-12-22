<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    @include('admin.css')
    <style>
        .category {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .local {
            display: inline-block !important;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sliderbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">User</h2>
          </div>
        </div>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="block margin-bottom-sm local">
                            <div class="title category"><strong>User Table</strong>
                                <a href="{{route('admin/user/create')}}" class="btn btn-info">create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        $basename = "http://localhost/e-commerce/public/"; ?>
                                        @foreach($model as $models)
                                        <tr>
                                            <th scope="row">{{$count++}}</th>
                                            <td>{{$models->name}}</td>
                                            <td>{{$models->email}}</td>
                                            <td>{{$models->phone}}</td>
                                            <td>{{$models->address}}</td>
                                            <td><a href="{{route('admin/user/update',$models->id)}}" class="btn btn-primary">Edit</a><a href="{{route('admin/user/read',$models->id)}}" class="btn btn-primary">View</a><a href="{{route('admin/user/delete',$models->id)}}" class="btn btn-primary">Delete</a></td>
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
    <!-- JavaScript files-->
   @include('admin.script')
  </body>
</html>