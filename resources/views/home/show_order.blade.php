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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            align-items: center;

        }

        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
      @include('sweetalert::alert')

        <!-- end header section -->
        <section class="card-container">
            @if (Session::has('message'))
            <div class="alert alert-danger text-center d-flex">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif

            @foreach($orders as $order)

            @if($order->delivery_status=="User has cancel the order")

            @else
            <div class="card">
                <img src="{{$order->image}}" alt="" height="auto" width="100%">
                <h2 style="background-color: #4CAF50;color: #fff;padding: 10px;border-radius: 0 0 8px 8px;">Product:{{$order->product_title}}</h2>

                <p>Quantity: {{$order->quantity}}</p>
                <p style="background-color:black; margin-top: 5px;color: #4CAF50;font-weight: bold;">Price: ${{$order->price}}</p>
                <button type="submit"  style="background-color:#d6120d"><a onclick="conformation(event)" href="{{route('cancel_order',$order->id)}}">Cancel Order</a></button>

            </div>
            @endif
            <!-- Add more cards as needed -->
            @endforeach
        </section>



        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <script>
            function conformation(event){
                event.preventdefalut();
                var urlToRedirect=ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title:"are you sure to cancel this product",
                    text:"are you sure to cancel this product",
                    icon:"warning",
                    buttons:true,
                    dangerMode:true,

                })
                .than((willCancel)=>{
                    if(willCancel){
                        Window.localtion.href=urlToRedirect
                    }
                })
            }
        </script>
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