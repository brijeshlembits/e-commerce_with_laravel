<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <section class="product_section layout_padding">
            <div class="container">
                
                <div class="container">
                    <form action="{{route('searchproduct')}}" method="get">
                        @csrf

                        <input type="text" name="search" class="d-flex" style="width: revert;" list="suggestions" placeholder="search product">
                        @foreach($product as $products)

                        <datalist id="suggestions">
                            <option value="{{$products->title}}">
                        </datalist>
                        @endforeach


                        <input type="submit" class="btn btn-danger" style="background-color: red;color: white;border: none !important;padding: 10px;width: auto !IMPORTANT;margin: 0;" value="Search">

                    </form>


                </div>
                <div class="row">
                    @foreach($product as $products)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{route('user/productdetails',$products->id)}}" class="option1">

                                        Product Details
                                    </a>
                                    <form action="" method="post">
                                        @csrf
                                        <a href="{{route('user/addtocart',$products->id)}}" class="option2">
                                            Add to Cart
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="{{$products->image}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$products->title}}
                                </h5>
                                @if($products->discount_price!=null)
                                <h6 style="color: red;">
                                    Discount
                                    ${{$products->discount_price}}
                                </h6>
                                <h6 style="text-decoration:line-through;color:blue;">
                                    Price
                                    ${{$products->price}}
                                </h6>
                                @else
                                <h6 style="color: blue;">
                                    Price
                                    ${{$products->price}}
                                </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <span style="padding-top:20px;">
                    {{ $product->links('pagination::bootstrap-4') }}
                </span>
        </section>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2023 Created By Brijesh Fotariya <br>

                Distributed By <a href="https://github.com/brijeshlembits" target="_blank">Brijesh Fotariya</a>

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