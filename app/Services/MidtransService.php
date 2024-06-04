<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Midtrans\Config;

class MidtransService {

    public function __construct() {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function getServerKey()
    {
        return Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    }
}
