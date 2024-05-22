<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store as RequestsStore;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Midtrans;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct() {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function store(Product $product) {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = Str::uuid();

        $order = Order::create($data);
        $this->getSnapRedirect($order);
    }

    public function getSnapRedirect(Order $order) {
        $user_details = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        $transaction_details = [
            'order_id' => $order->id,
            'gross_amount' => $order->product->price,
        ];
    }
}
