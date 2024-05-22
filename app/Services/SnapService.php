<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Notification;

class SnapService extends MidtransService
{

    protected $order;

    public function __construct(Order $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function generateSnapToken()
    {
        $user = Auth::user();
        $transaction_details = [
            'order_id' => $this->order->id,
            'gross_amount' => $this->order->product->price,
        ];

        $item_details = [
            'id' => $this->order->product->id,
            'price' => $this->order->product->price,
            'quantity' => 1,
            'name' => $this->order->product->name
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

        try {
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callbackHandle()
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;


        error_log("Order ID $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud");

        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
              // TODO Set payment status in merchant's database to 'challenge'
            }
            else if ($fraud == 'accept') {
              // TODO Set payment status in merchant's database to 'success'
            }
        }
        else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
              // TODO Set payment status in merchant's database to 'failure'
            }
            else if ($fraud == 'accept') {
              // TODO Set payment status in merchant's database to 'failure'
            }
        }
        elseif ($transaction == 'deny') {
              // TODO Set payment status in merchant's database to 'failure'
        }
    
    }
}
