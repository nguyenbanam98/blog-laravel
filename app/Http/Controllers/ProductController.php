<?php

namespace App\Http\Controllers;

use App\Product;
use App\Traits\GetDataTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use GetDataTrait;

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        $productRecommend = Product::where('id', '!=', $id)->where('category_id', $product->category_id)->take(6)->get();
        $dataView = $this->getDataView();
        $dataView['product'] = $product;
        $dataView['productRecommend'] = $productRecommend;

        return view('pages.product.detail', $dataView);
    }
}
