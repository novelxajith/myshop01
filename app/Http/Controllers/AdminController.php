<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main_category;


class AdminController extends Controller
{
    public function index()
    {
        // Your logic here
        return view('admin/index'); // Renders the "contact" view
    }

    public function signin()
    {
        // Your logic here
        return view('admin/signin'); // Renders the "contact" view
    }

    public function add_product()
    {
        // Your logic here
        return view('admin/add_product'); // Renders the "contact" view
    }

    public function product_list()
    {
        // Your logic here
        return view('admin/product_list'); // Renders the "contact" view
    }

    public function orders()
    {
        // Your logic here
        return view('admin/orders'); // Renders the "contact" view
    }

    public function order_details()
    {
        // Your logic here
        return view('admin/order_details'); // Renders the "contact" view
    }

    public function add_category()
    {
        $main_categories = Main_category::all();
        return view('admin/add_category', compact('main_categories'));
    }

    
}
