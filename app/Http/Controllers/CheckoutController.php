<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.login_checkout')
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $customer = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/checkout');
    }


    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.show_checkout')
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect('/payment');
    }
    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')
            ->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.payment')
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/trang-chu');
    }
    public function login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $result = DB::table('tbl_customers')
            ->where('customer_email', $name)
            ->where('customer_password', $password)
            ->first();
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return  Redirect::to('/checkout');
        } else {
            return  Redirect::to('/login_checkout');
        }
    }
}
