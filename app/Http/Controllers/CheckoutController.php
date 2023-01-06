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
}
