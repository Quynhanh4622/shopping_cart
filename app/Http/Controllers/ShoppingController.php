<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function save(Request $request)
    {
        if (!Session::has('shoppingCart') || count(Session::get('shoppingCart')) == 0) {
            Session::flash('error-msg', 'hien tai khong co san pham nao trong gio hang');
            return redirect('/list');
        }
        $shoppingCart = Session::get('shoppingCart');
        $order = new Order();
        $order->totalPrice = 0;
        $order->customerId = 1;
        $order->shipName = $request->get('shipName');
        $order->shipPhone = $request->get('shipPhone');
        $order->shipAddress = $request->get('shipAddress');
        $order->note = $request->get('note');
        $order->isCheckout = false;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->status = 0;
        $orderDetails = [];
        $messageError = '';
        foreach ($shoppingCart as $cartItem) {
            $product = Product::find($cartItem->id);
            if ($product == null) {
                $messageError = 'co loi say ra, san pham voi id' . $cartItem->id . 'khong ton tai hoac da bi xoa';
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->productId = $product->id;
            $orderDetail->unitPrice = $product->price;
            $orderDetail->quantity = $cartItem->quantity;
            $order->totalPrice += $orderDetail->quantity * $orderDetail->unitPrice;
            array_push($orderDetails, $orderDetail);
        }
        if (count($orderDetails) == 0){
            Session::flash('error=msg',$messageError);
            return redirect('/list');
        }
        try {
            DB::beginTransaction();
            $order->save();
            $orderdetailArray = [];
            foreach ($orderDetails as $orderDetail){
                $orderDetail->orderId = $order->id;
                array_push($orderdetailArray, $orderDetail->toArray());
            }
            OrderDetail::insert($orderdetailArray);
            DB::commit();
            Session::forget('shoppingCart');
            Session::flash('success-msg', 'luu don hang thanh cong');
        }catch (\Exception $e ){
            DB::rollBack();
            return $e;
//           Session::flash('error-msgg', 'luu don hang that bai');
        }
        return redirect('/list');
    }
}
