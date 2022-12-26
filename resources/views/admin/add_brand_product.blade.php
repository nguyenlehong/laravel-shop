@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Them thuong hieu
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ten thuong hieu</label>
                            <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">mota</label>
                            <textarea name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">trang thai</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0"> An </option>

                                <option value="1"> Hien thi</option>

                            </select>
                        </div>

                        <button type="submit" name="add_brand_product" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection