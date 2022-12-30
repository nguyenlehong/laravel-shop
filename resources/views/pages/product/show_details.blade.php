@extends('welcome')
@section('content')
<div class="product-details"><!--product-details-->
    @foreach ($product as $item =>$pro)
        
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />


            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
            </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$pro->product_name}}</h2>
            <p>09437b384a2{{$pro->product_id}}</p>
            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="post">
              {{csrf_field()}}
              <span>
                <span>US {{number_format($pro->product_price)}}</span>
                <label>So luong:</label>
                <input type="number" name="qty" min="1" max="10" value="1"/>
                <input type="hidden" name="productid_hidden" value="{{$pro->product_id}}" />
               
                <button type="submit" class="btn btn-fefault cart">
                  <i class="fa fa-shopping-cart"></i>
                  Add to cart
                </button>
              </span>
            </form>
              <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png"
               class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
    @endforeach

</div><!--/product-details-->
@endsection

{{-- <!-- Wrapper for slides -->
  <div class="carousel-inner">
      <div class="item active">
        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
      </div>
      <div class="item">
        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
      </div>
      <div class="item">
        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
      </div>
      
  </div>

<!-- Controls --> --}}