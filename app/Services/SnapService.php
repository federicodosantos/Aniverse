<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Notification;

class SnapService extends MidtransService
{

    protected $product;

    public function __construct(Product $product)
    {
        parent::__construct();

        $this->product = $product;
    }

    public function generateSnapToken($user)
    {
        $order_id = Str::uuid();

        $transaction_details = [
            'order_id' => $order_id,
            'gross_amount' => $this->product->price,
        ];

        $item_details = [
            [
            'id' => $this->product->id,
            'price' => $this->product->price,
            'quantity' => 1,
            'name' => $this->product->name
            ]
        ];

        $customer_details = [
            'first_name' => $user->name,
            'last_name' => "",
            'email' => $user->email,
            'phone' => "",
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details
        ];

        $order = Order::where('user_id', $user->id)
            ->where('product_id', $this->product->id)->first();

        if ($order && $order->status == 'PENDING') {
            return redirect()->route('shop.history');
        }

        try {
            $response = Snap::createTransaction($params);

            Log::info('response: ', [$response]);

            $token = $response->token;
            $redirect_url = $response->redirect_url;

            Order::create([
                'id' => $order_id,
                'user_id' => $user->id,
                'product_id' => $this->product->id,
                'gross_amount' => $this->product->price,
                'token' => $token,
                'redirect_url' => $redirect_url,
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ]);

            return $response;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
