<?php

namespace App\Http\Controllers;

use App\Product;
use App\Traits\GetDataTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use GetDataTrait;
    public function saveCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        $data['id'] = $request->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = '1';
        $data['options']['image'] = $product->img_path;

        Cart::add($data);
        // Cart::destroy();

        return redirect()->to('/show-cart');

    }

    public function show()
    {
        $dataView = $this->getDataView();
        return view('pages.cart.show', $dataView);
    }

    public function delete($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }

    public function updateQty(Request $request, $id)
    {
        $qty = $request->quantity;
        Cart::update($id, $qty);

        return redirect()->back();

    }
}
