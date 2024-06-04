<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = [
            'id' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => 1,
            'photo_link' => $request->photo_link,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        Product::create($product);

        return redirect('/shop');
    }

    public function showCreate() {
        return view('shop_create');
    }

    public function update($id, Request $request) {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($request->name) {
            $product->name = $request->name;
        }
        if ($request->description) {
            $product->description = $request->description;
        }
        if ($request->price) {
            $product->price = $request->price;
        }

        if ($request->stock) {
            $product->stock = $request->stock;
        }

        if ($request->photo_link) {
            $product->photo_link = $request->photo_link;
        }

        $product->save();

        return response()->json($product);
    }

    public  function showUpdateForm()
    {
        return view('shop_update');
    }

    public function delete($id) {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return redirect('/shop');
    }

    public function showAll() {
        $products = Product::all()->sortByDesc('created_at');

        if ($products->count() == 0) {
            return response()->json(['message' => 'No products found'], 404);
        }

        return response()->json($products);
    }

    public function showPage() {
        return view('shop');
    }

    public function showDetail($id) {
        $product = Product::with('user')->where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('product', ['product' => $product]);
    }

    public function showHomeProduct()
    {
        $products = Product::all()->sortByDesc('created_at')->take(4);

        if ($products->count() == 0) {
            return response()->json(['message' => 'No products found'], 404);
        }
        return response()->json($products);
    }
}
