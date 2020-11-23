<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url)) {
            $product = Product::where([
                'category_id' => $id,
                'active' => 1,
            ])->orderByDesc('id')->paginate(10);
        }

        return redirect('/');
    }
}
