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
        .payment-status-label {
        padding: 5px 10px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        display: inline-block;
        text-align: center;
    }

    .cash-on-delivery {
        background-color: blue;
    }

    .online-payment {
        background-color: green;
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
                    <h2 class="h5 no-margin-bottom">Orders</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="block margin-bottom-sm local">
                            <div class="title category"><strong>Product Table</strong>
                            <form action="{{route('order/search')}}" method="get">
                                @csrf
                            <input type="text" name="search" class="search">
                            <button type="submit" class="btn btn-info">search</button>
                            </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Payment Status</th>
                                            <th>Delivery Status</th>
                                            <th>Delivered</th>
                                            <th>Print pdf</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        $basename = "http://localhost/e-commerce/public/"; ?>
                                        @foreach($order as $order)
                                        <tr>
                                            <th scope="row">{{$count++}}</th>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->product_title}}</td>
                                            <td><img src="{{$basename}}{{$order->image}}" alt="" style="height: 50px;width:50px;"></td>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>
                                                @if($order->payment_status == 'cash on delivery')
                                                <label class="payment-status-label cash-on-delivery">Cash on Delivery</label>
                                                @else
                                                <label class="payment-status-label online-payment">Online Payment</label>
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->delivery_status == 'proccessing')
                                                <label class="payment-status-label cash-on-delivery">Proccessing</label>
                                                @else
                                                <label class="payment-status-label online-payment">Delivered</label>
                                                @endif
                                            </td>
                                            <td><a href="{{route('delivered',$order->id)}}"><i class="fa fa-truck"></i></a></td>

                                            <td><a href="{{route('print_pdf',$order->id)}}"><i class="	fa fa-file"></i></a></td>
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