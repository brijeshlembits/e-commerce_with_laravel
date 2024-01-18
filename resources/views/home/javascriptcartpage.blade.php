<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <?php $baseUrl = 'http://localhost/e-commerce/public/'; ?>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ $baseUrl }}images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ $baseUrl }}home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{ $baseUrl }}home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ $baseUrl }}home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ $baseUrl }}home/css/responsive.css" rel="stylesheet" />
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

            button,
            [type='button'] {
                background-color: #d39e00;
            }

            .totalprice {
                background-color: #363535;
                color: white;
                padding: 10px;
                margin: 10px;
                text-align: center;
                justify-content: center;

            }

            .hello {
                margin-top: auto !important;
                margin-left: 10px;
            }
        </style>

        <?php $baseUrl = 'http://localhost/e-commerce/public/'; ?>


        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        @if (Session::get('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>

                        </div>
                        <?php //$totalprice = 0;
                        ?>
                        <form action="{{ route('savecartdata') }}" method="post" class="ajax-form" id="cartForm">
                            @csrf
                            <input type="hidden" name="cartItems" id="cartItemsInput">
                            @foreach ($cart as $carts)
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{ $baseUrl }}{{ $carts->image }}"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt" height="100px"
                                                    width="60px">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">{{ $carts->product_title }}</p>
                                                <!-- <p><span class="text-white">Size: </span>M <span class="text-white">Color: </span>Grey</p> -->
                                            </div>

                                            <h5 class="mb-0 price" name="price" value="{{ $carts->oneprice }}">
                                                {{ $carts->oneprice }}</h5>

                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="hidden" name="id" class="item-id"
                                                    value="{{ $carts->product_id }}">

                                                <input id="form1" min="0" name="qty"
                                                    value="{{ $carts->quantity }}" onchange="subtotal()" max="10"
                                                    min="1" type="number"
                                                    class="form-control quantity-input form-control-sm" />

                                                <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0 iprice" value="{{ $carts->price }}">
                                                    {{ $carts->price }}</h5>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="{{ route('user/removecart', $carts->id) }}"
                                                    class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php //$totalprice += $carts->price
                                ?>
                            @endforeach
                            <div class="totalprice d-flex">
                                Total Price :
                                <p class="total" name="total" id="total"></p>
                            </div>




                            <div class="card">
                                <div class="card-body d-flex col-md-12 ">

                                    <input type="submit" class="submit" name="" id="">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>


        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2023 Created By Brijesh Fotariya <br>

                <a href="https://github.com/brijeshlembits" target="_blank">Brijesh Fotariya</a>

            </p>
        </div>
        <script>
            let quantity = document.getElementsByClassName('quantity-input');
            let price = document.getElementsByClassName('price');
            let iprice = document.getElementsByClassName('iprice');
            let totalprice = document.getElementsByClassName('total');

            let cartItemsInput = document.getElementById('cartItemsInput');
            let cartItems = [];

            let id = document.getElementsByClassName('item-id');


            let tp = 0;
            // console.log('hello')
            // console.log(price[0]);

            // console.log(id.length);
            // console.log(totalprice[0].innerHTML);
            // console.log(quantity);

            function subtotal() {
                // Initialize tp and cartItems here
                for (let k = 0; k < quantity.length; k++) {
                    iprice[k].innerHTML = (price[k].innerHTML) * (quantity[k].value);
                    


                    let data = {
                        tolprice: iprice[k].innerHTML,
                        price: price[k].innerText,
                        quantity: quantity[k].value,
                        totalprice:tp ,

                        id: id[k].value,
                    };

                    console.log(data);

                    // Assuming you want to display the quantity in an element with class 'quantity-input'
                    document.querySelector('.quantity-input').textContent = quantity[k].value;

                    cartItems.push(data);

                }
                console.log(cartItems.length)
                for(let i=0;i<cartItems.length;i++){

                    console.log(iprice[i].innerHTML);
                    tp=tp+parseInt(iprice[i].innerHTML);
                }
                totalprice[0].innerHTML = tp;

                let totalData = {
                    totalprice: totalprice[0].innerHTML,
                };

                cartItems.push(totalData);
                // console.log(cartItems);

                document.getElementById('cartItemsInput').value = JSON.stringify(cartItems);
            }

            subtotal();

            // Assuming you are using fetch API or a similar library for making HTTP requests
            fetch('/savecartdata', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        // Add any additional headers if needed
                    },
                    body: JSON.stringify({
                        cartItems: cartItems
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        </script>
        <!-- jQery -->
        <script src="{{ $baseUrl }}home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="{{ $baseUrl }}home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="{{ $baseUrl }}home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="{{ $baseUrl }}home/js/custom.js"></script>
</body>

</html>
