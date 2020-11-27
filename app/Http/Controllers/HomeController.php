<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('active', 1)->latest()->get();

        $brands = Brand::where('active', 1)->latest()->get();

        $products = Product::where('active', 1)->latest()->limit(6)->get();

        $dataView = [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
        ];
        return view('pages.home.home', $dataView);
    }
}
