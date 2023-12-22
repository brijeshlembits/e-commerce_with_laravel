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
                    <h2 class="h5 no-margin-bottom">Create Product</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="block">
                    <div class="title"><strong class="d-block">Basic Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                    <div class="block-body">

                        <form id="myForm" action="{{route('admin/user/save')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" placeholder="Enter a Name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" value="{{$user->email}}" placeholder="Enter a email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Usertype</label>
                                <select class="text_color" name="usertype">
                                    <option value="" selected=""> Add a User type here</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="text" name="password" value="{{$user->password}}" placeholder="Enter a password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Phone</label>
                                <input type="text" name="phone" value="{{$user->phone}}" placeholder="Enter a Title Name" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Address</label>
                                <input type="text" name="address" value="{{$user->address}}" placeholder="Enter a Title Name" id="address" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Signin" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- JavaScript files-->
        @include('admin.script')
</body>

</html>