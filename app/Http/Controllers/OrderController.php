<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store as RequestsStore;
use App\Models\Order;
use App\Models\Product;
use App\Services\MidtransService;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Services\SnapService;

class OrderController extends Controller
{
    public function __construct() {

    }

    public function store(Product $product) {
        if (Auth::user() == null) {
            return redirect('/login');
        }

        $snapService = new SnapService($product);
        $response = $snapService->generateSnapToken(Auth::user());

        if ($response instanceof RedirectResponse) {
            return $response;
        }

        return redirect($response->redirect_url);
    }

    public function handleCallback(Request $request) {

       $order_id = $request->order_id;
       $status = $request->status_code;
       $transaction = $request->transaction_status;

       $order = Order::where('id', $order_id)->first();
       if (!$order) {
           return response()->json([
               'status' => 'error',
               'message' => 'Order not found'
           ], 404);
       }

       if ($transaction == 'capture') {
           $order->status = 'PENDING';
       } else if ($transaction == 'settlement') {
           $order->status = 'SUCCESS';
       } else if ($transaction == 'pending') {
           $order->status = 'PENDING';
       } else if ($transaction == 'deny') {
           $order->status = 'CANCELLED';
       } else if ($transaction == 'expire') {
           $order->status = 'CANCELLED';
       } else if ($transaction == 'cancel') {
           $order->status = 'CANCELLED';
       }

       $order->save();

       return redirect(route('shop.history'))->with('success', 'Payment success');
    }

    public function getAllHistory() {
        Log::info("id", [Auth::user()->id]);
        $orders = Order::with('product')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        Log::info('orders', [$orders]);

        return view('history', ['orders' => $orders]);
    }
}
