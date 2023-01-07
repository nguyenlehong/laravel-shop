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
            <p>dang ky hoac dang nhap de thanh toan</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
              
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save_checkout')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shopping_name" placeholder=" Name">
                                <input type="text" name="shopping_email" placeholder="Email*">
                                <input type="text" name="shopping_address" placeholder="address">
                                <input type="text" name="shopping_phone" placeholder="phone *">
                               <input type="submit" value="GUi">
                            
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                       
                    </div>	
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

       
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection
