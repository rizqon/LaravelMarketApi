<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\User;
use App\Model\Store\Product;
use App\Http\Resources\Product as ProductResources;
use App\Http\Requests\StoreProduct;

class ProductApiController extends Controller
{
    public function byMerchant(Request $request, User $merchant)
    {
        $per_page = $request->per_page ?? 15;

        return ProductResources::collection($merchant->products()->paginate($per_page));
    }

    public function show(Product $product)
    {
        return new ProductResources($product);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'image' => 'nullable',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'in_stock' => 'nullable|boolean'
        ]);

        $product = new Product([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'image' => $request->image,
            'weight' => $request->weight,
            'price' => $request->price,
            'stock' => $request->stock,
            'in_stock' => isset($request->in_stock) ? false : $request->in_stock > 1,
        ]);
        $merchant = $request->user();
        $merchant->products()->save($product);
        $product->storefronts()->attach(1);
        $product->category()->attach(1);

        return new ProductResources($product);

    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $request->validate([
            'title' => 'required|min:5|max:255',
            'image' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'in_stock' => 'required|boolean'
        ]);
        
        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->image = $request->image;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->in_stock = $request->in_stock;
        $product->save();

        return new ProductResources($product);
    }

    public function delete(Product $product)
    {
        $this->authorize('delete', $product);
        
        $product->delete();

        return response()->json([
            'message' => 'Success Delete Product'
        ], 200);
    }
}
