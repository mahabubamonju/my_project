<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Product;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::all();
        $carousel = Carousel::all();
        return view('frontend.home', ['ourProducts' => $products, 'carousels' => $carousel]);
    }
    function shop()
    {
        $p = Product::all();
        return view('frontend.shop', ['products' => $p]);
    }
    function singleProduct($id)
    {   
        $p = Product::find($id);
        return view('frontend.singleProduct',["product" => $p]);
    }
    function cartDisplay()
    {
        return view('frontend.cart');
    }
    function checkoutDisplay()
    {
        return view('frontend.checkout');
    }
}
