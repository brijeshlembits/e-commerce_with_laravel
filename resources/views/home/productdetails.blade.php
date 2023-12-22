<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <?php $baseUrl = "http://localhost/e-commerce/public/"; ?>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{$baseUrl}}images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{$baseUrl}}home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{$baseUrl}}home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{$baseUrl}}home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{$baseUrl}}home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <?php $baseUrl = "http://localhost/e-commerce/public/";?>

        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="{{$baseUrl}}{{$product->image}}" width="250" /> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <a href="{{route('redirect')}}"><i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</a></span> </div>
                                    </div>
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{{$product->title}}</span>
                                        <h5 class="text-uppercase">{{$product->category}}</h5>
                                        @if($product->discount_price!=null)

                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price" style="color: red;">${{$product->discount_price}}</span>
                                            <div class="ml-2"> <small class="dis-price" style="text-decoration:line-through;color:blue;">${{$product->price}}</small> </div>
                                        </div>
                                        @else
                                        <div class="ml-2"> <small class="dis-price" style="text-decoration:line-through;color:blue;">${{$product->price}}</small> </div>
                                        @endif
                                    </div>
                                    <p class="about">{{$product->description}}</p>
                                    <form action="{{route('user/addtocart',$product->id)}}" method="post">
                                        @csrf
                                    <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Quantity</h6>
                                        <input type="number" name="qty" min="1" max="10" value="1">
                                    </div>
                                    <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add Cart</button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>