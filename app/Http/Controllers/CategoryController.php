<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoryHome($id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::where('active', 1)->latest()->get();

        $brands = Brand::where('active', 1)->latest()->get();

        $products = $category->products->where('active', 1)->all();

        // $quantity = $brand->products->where('active', 1)->count();

        $dataView = [
            'categories' => $categories,
            'brands' => $brands,
            'category' => $category,
            'products' => $products,
            // 'quantity' => $quantity,

        ];

        return view('pages.category.show', $dataView);
    }
}
