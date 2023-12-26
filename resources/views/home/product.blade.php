<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="container">
         <form action="{{route('productsearch')}}" method="get">
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