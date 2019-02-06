<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\User\Cart;
use App\Model\Store\Product;
use App\Http\Resources\Cart as CartResources;

class CartApiController extends Controller
{
    public function index(Request $request)
    {
        $carts = $request->user()->carts;

        return CartResources::collection($carts);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|gt:0|integer'
        ]);

        if ($validator->fails()){
            return response()->json($validator->messages(), 422);
        }
        $user = $request->user();

        $user->carts()->updateOrCreate(
            [
                'product_id' => $request->product_id
            ],
            [
                'quantity' => $request->quantity,
                'total_price' => Product::find($request->product_id)->price * $request->quantity
            ]
        );

        return CartResources::collection($user->carts);
    }

    public function update(Request $request, Cart $cart)
    {
        $this->authorize('update', $cart);

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|gt:0|integer'
        ]);

        if ($validator->fails()){
            return response()->json($validator->messages(), 422);
        }

        $cart->quantity = $request->quantity;
        $cart->total_price = Product::find($cart->product_id)->price * $request->quantity;
        $cart->save();

        return CartResources::collection($request->user()->carts);
    }

    public function delete(Request $request, Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return CartResources::collection($request->user()->carts);
    }
}
