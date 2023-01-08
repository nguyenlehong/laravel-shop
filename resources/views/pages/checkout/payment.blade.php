@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

 

        <div class="register-req">
            <p>thanh toan</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
        
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>
        <div class="container">
            <?php
                $content = Cart::content();
              
    
                ?>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $v_content)
    
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}"
                                        alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($v_content->price)}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{URL::to('/update-qty')}}" method="POST">
                            {{ csrf_field() }}
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                        value="{{$v_content->qty}}">
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                        <input type="submit" value="cap nhat" name="update_qty">
                                    </form>
                                        
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    <?php
                                    $tong = $v_content->price * $v_content->qty;
                                    echo number_format($tong);
                                    ?>
    
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content ->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
    
    
                    </tbody>
                </table>
            </div>
        </div>

       
        <div class="payment-options">
                <span>
                    <label><input type="checkbox" name="payment_option" value="1"> Direct Bank Transfer</label>
                </span> 
                <span>
                    <label><input type="checkbox" name="payment_option" value="2"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox" name="payment_option" value="3"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection
