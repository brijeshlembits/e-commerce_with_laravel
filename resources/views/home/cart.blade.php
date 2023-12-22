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
        <style>
            .card {

                background-color: #4e4b4b;
            }

            [type='number'] {

                background-color: #363535;
                color: white;
            }

            .btn-link .fa-minus {
                color: black;
            }

            .btn-link .fa-plus {
                color: black;
            }
            button, [type='button'] {
    background-color: #d39e00;
}
        </style>

        <?php $baseUrl = "http://localhost/e-commerce/public/"; ?>


        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>

                        </div>
                        @foreach($cart as $carts)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{$baseUrl}}{{$carts->image}}" class="img-fluid rounded-3" alt="Cotton T-shirt" height="100px" width="60px">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{$carts->product_title}}</p>
                                        <!-- <p><span class="text-white">Size: </span>M <span class="text-white">Color: </span>Grey</p> -->
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fa fa-minus"></i>
                                        </button>

                                        <input id="form1" min="0" name="qty" max="10" min="1" value="{{$carts->quantity}}" type="number" class="form-control form-control-sm" />

                                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">${{$carts->price}}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


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