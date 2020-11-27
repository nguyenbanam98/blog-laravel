<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Traits\GetDataTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use GetDataTrait;
    public function showBrandHome($id)
    {
        $brand = Brand::findOrFail($id);

        // $categories = Category::where('active', 1)->latest()->get();

        // $brands = Brand::where('active', 1)->latest()->get();

        $products = $brand->products->where('active', 1)->all();

        $dataView = $this->getDataView();

        $dataView['brand'] = $brand;
        $dataView['products'] = $products;

        return view('pages.brand.show', $dataView);
    }
}
