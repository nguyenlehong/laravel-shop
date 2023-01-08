@extends('welcome')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{URL::to('/login')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Name" name="name" />
                        <input type="password" placeholder="Email Address" name="password"/>
                        
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{URL::to('/add_customer')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" placeholder="Name"/>
                        <input type="text" name="customer_email" placeholder="Email Address"/>
                        <input type="password" name="customer_password" placeholder="Password"/>
                        <input type="text" name="customer_phone" placeholder="phone"/>

                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
