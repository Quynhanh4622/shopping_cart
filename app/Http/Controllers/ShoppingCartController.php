<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;


class ShoppingCartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->get('productId');
        $producQuantity = $request->get('productQuantity');
        $action = $request->get('cartAction');
        $product = Product::find($productId);
        if ($product == null) {
            return view('404');
        }
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        $cartItem = null;
        $massage = ' đã thêm vào giỏ hàng';
        if (!array_key_exists($productId, $shoppingCart)) {
            $cartItem = new \stdClass();
            $cartItem->id = $product->id;
            $cartItem->name = $product->name;
            $cartItem->thumbnail = $product->thumbnail;
            $cartItem->unitPrice = $product->price;
            $cartItem->quantity = intval($producQuantity);
        } else {
            $cartItem = $shoppingCart[$productId];
            if ($action != null && $action == 'update') {
                $cartItem->quantity = $producQuantity;
                $massage = ' update san pham thanh cong';
            } else {
                $cartItem->quantity += $producQuantity;

            }
        }
        $shoppingCart[$productId] = $cartItem;
        Session::put('shoppingCart', $shoppingCart);
//        Session::flash('success-msg', 'them san pham vao gio hang thanh cong ');
        return redirect('/show')->with('massage',$massage);
    }

    public function show()
    {
        $shoppingCart =  Session::get('shoppingCart');
        return view('/cart',[
            'shoppingCart' =>$shoppingCart,
        ]);

    }

    public function remove(Request $request)
    {
        $productId =  $request->get('productId');
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
            unset($shoppingCart[$productId]);
            Session::put('shoppingCart',$shoppingCart);
            return redirect('/show')->with('remove',
                ' da xoa san pham khoi gio hang');
        }
    }
}
