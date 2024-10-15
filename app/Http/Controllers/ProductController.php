<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.shop', compact('products'));
    }

    public function single(string $id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.single-product', compact('product'));
    }
}
