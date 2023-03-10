@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Them  san pham
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
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ten san pham</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">gia</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">mota</label>
                            <textarea name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">noi dung</label>
                            <textarea name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">hinh anh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">danh muc</label>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}"> {{$cate->category_name}}</option> 
                                @endforeach
                            </select>
                        </div>          <div class="form-group">
                            <label for="exampleInputPassword1">thuong hieu</label>
                            <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}"> {{$brand->brand_name}}</option> 
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">trang thai</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0"> An </option>

                                <option value="1"> Hien thi</option>

                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection