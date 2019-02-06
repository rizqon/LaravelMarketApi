<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Cart;
use App\Model\Order\Order;
use App\Model\Order\OrderDetail;
use App\Model\Store\Product;
use App\Http\Resources\OrderDetail as OrderDetailResources;
use App\Http\Resources\Order as OrderResources;
use App\Events\OrderCreated;
use Validator;

class OrderApiController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->user();
        $address = $user->address()->first();
        $status = 'waiting-payment';

        if($user->carts->count() < 1){
            return response()->json([
                'message' => 'cart empty'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'method' => 'required',
            'from_bank' => 'required',
            'to_bank' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->messages(), 422);
        }

        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'status' => $status,
            'method' => $request->method,
            'from_bank' => $request->from_bank,
            'to_bank' => $request->to_bank,
            'total_payment' => $user->carts()->sum('total_price')
        ]);

        event(new OrderCreated($order));

        return response()->json($order, 200);
    }

    public function lists(Request $request)
    {
        $user = $request->user();

        $orderDetail = OrderDetail::where('merchant_id', $user->id)->get();

        return OrderDetailResources::collection($orderDetail);
    }

    public function history(Request $request)
    {
        $user = $request->user();

        return OrderResources::collection($user->orders);
    }
}
