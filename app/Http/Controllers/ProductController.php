<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
class ProductController extends Controller
{
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product()
    {
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();

        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        //bai 22
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            session::put('message', 'them san pham thanh cong');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'them tthanh cong');
        return Redirect::to('add-product');
    }

    public function active_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', ' kich hoat danh muc thanh cong');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', ' kich hoat danh muc thanh cong');
        return Redirect::to('all-product');
    }


    public function edit_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            session::put('message', 'cap nhat san pham thanh cong');
            return Redirect::to('all-product');
        }
        // $data['product_image'] = '';
        DB::table('tbl_product')->update($data);
        Session::put('message', 'cap nhat thanh cong');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'xoa danh thanh cong');
        return Redirect::to('all-product');
    }
    // ================== *==============
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')
            ->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '0')
            ->orderBy('brand_id', 'desc')->get();
        $product = DB::table('tbl_product')->where('product_id', $product_id)
            ->get();
        return view('pages.product.show_details')
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('product', $product);
    }
}
