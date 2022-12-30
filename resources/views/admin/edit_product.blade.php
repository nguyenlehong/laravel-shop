@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                cap nhat san pham
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
                    @foreach ($edit_product as $item =>$pro)
                        
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ten san pham</label>
                            <input type="text" value="{{$pro->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">gia</label>
                            <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">mota</label>
                            <textarea name="product_desc"class="form-control" id="exampleInputPassword1">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">noi dung</label>
                            <textarea name="product_content"  class="form-control" id="exampleInputPassword1" placeholder="Password">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">hinh anh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">danh muc</label>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                @if ($cate_product->category_id = $pro->category_id)
                                <option selected value="{{$cate_product->category_id}}"> {{$cate->category_name}}</option> 
                                @else
                                <option value="{{$cate_product->category_id}}"> {{$cate->category_name}}</option> 
                           
                                @endif
                                @endforeach
                            </select>
                        </div>          
                        <div class="form-group">
                            <label for="exampleInputPassword1">thuong hieu</label>
                            <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                @if ($brand_product->barnd_id = $pro->brand_id)
                                <option selected value="{{$brand->brand_id}}"> {{$brand->brand_name}}</option>                                  
                                @else
                                <option value="{{$brand->brand_id}}"> {{$brand->brand_name}}</option> 
                                    
                                @endif
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
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection