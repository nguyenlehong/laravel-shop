@extends('welcome')
@section('content')
<div class="features_items">
    <!--features_items-->
    @foreach($category_name as $item =>$cate)
    <h2 class="title text-center"> Danh muc {{$cate->category_name}}</h2>
    
@endforeach


    <div class="col-sm-4">
        <div class="product-image-wrapper">


@foreach ($product as $item=>$pro)
    
<div class="single-products">
    <div class="productinfo text-center">
        <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
        <h2>{{number_format($pro->product_price)}}</h2>
        <p>{{$pro->product_name}}</p>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" 
                        class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart"></i>Add to cart
                    </a>
                </div>
            
            </div>
            @endforeach
            
            
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="asdfas"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="asdfas"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection