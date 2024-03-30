<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $pageName['pageName'] = 'index';
        return view('ecommerce/index',$pageName); 
    }

    public function signin()
    {
        return view('ecommerce/sign-in'); 
    }

    public function signup()
    {
        return view('ecommerce/sign-up'); 
    }
    public function product_details()
    {
        $pageName['pageName'] = 'categories';
        return view('ecommerce/product_details',$pageName); 
    }
    public function products()
    {
        $pageName['pageName'] = 'products';
        return view('ecommerce/products',$pageName); 
    }
    public function checkout()
    {
        $pageName['pageName'] = 'checkout';
        return view('ecommerce/checkout',$pageName); 
    }
    public function cart()
    {
        $pageName['pageName'] = 'cart';
        return view('ecommerce/cart',$pageName); 
    }
    public function product()
    {
        $pageName['pageName'] = 'product';
        return view('product',$pageName); 
    }
    public function checkoute()
    {
        $pageName['pageName'] = 'checkout';
        return view('checkout',$pageName); 
    }
}
