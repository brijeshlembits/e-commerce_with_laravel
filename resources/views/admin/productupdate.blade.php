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

                        <form id="myForm" action="{{route('admin/product/save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input type="text" name="title" value="{{$product->title}}" placeholder="Enter a Title Name" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input type="text" name="description" value="{{$product->description}}" placeholder="Enter a Title Name" id="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Category</label>
                                <select class="text_color" name="category">
                                    <option value="" selected=""> Add a category here</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Quantity</label>
                                <input type="text" name="quantity" value="{{$product->quantity}}" placeholder="Enter a Title Name" id="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Price</label>
                                <input type="text" name="price" value="{{$product->price}}" placeholder="Enter a Title Name" id="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">discount_price</label>
                                <input type="text" name="disprice" value="{{$product->discount_price}}" placeholder="Enter a Title Name" id="disprice" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Image</label>
                                <input type="file" name="image" value="{{$product->image}}" placeholder="Enter a Title Name" id="image" class="form-control">
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