<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('service', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('service_detail_slug', $slug)->firstOrFail();
        return view('service-detail', compact('product'));
    }
}
