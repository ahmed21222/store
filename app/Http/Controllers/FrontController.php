<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products = Product::take(3)->get();
        return view('home.index', compact('products'));
}

}
