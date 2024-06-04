<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-8 justify-center items-center text-center">
            <div class="box-content h-[600px] w-full bg-white bg-opacity-10 rounded-3xl">
                <div class="flex flex-row items-center">
                    <a href="/shop" class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-r-lg rounded-t-lg hover:bg-blue-700">
                        <svg class="w-8 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <h1 class="mx-auto py-3 pr-12 text-3xl font-bold tracking-tight text-white">History Checkout</h1>
                </div>
                <div class="h-[5px] bg-blue-600"></div>
                <div class="flex flex-col">
                    <div class="py-5 px-8 overflow-y-auto max-h-96">
                        @if(!$orders->count())
                            <div class="text-3xl font-bold tracking-tight text-white text-center py-16">
                                Tidak ada riwayat pembelian
                            </div>
                        @else
                            @foreach ($orders as $order)
                                <div class="flex flex-row mb-4 justify-center items-center">
                                    <div class="px-4 py-2">
                                        <img src="{{ $order->product->photo_link }}" alt="{{ $order->product->name }}" class="w-72 h-80 bg-white object-contain">
                                    </div>
                                    <div class="ml-4 text-left whitespace-normal overflow-wrap break-words w-1/2">
                                        <h2 class="text-3xl font-bold">{{ $order->product->name }}</h2>
                                        <p>Description: {{ $order->product->description }}</p>
                                        <p>Price: Rp.{{ number_format($order->product->price, 2) }}</p>
                                        <div>
                                            @if ($order->status === 'PENDING')
                                                <div class="inline-block bg-yellow-500 text-white py-1 px-2 rounded-md">Pending</div>
                                                <a href="{{ $order->redirect_url }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Pay Now</a>
                                            @elseif ($order->status === 'SUCCESS')
                                                <div class="inline-block bg-green-500 text-white py-1 px-2 rounded-md">Success</div>
                                            @else
                                                <div class="inline-block bg-red-500 text-white py-1 px-2 rounded-md">Failed</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mx-auto h-4 w-1/2">
                        <div class="px-10 bg-blue-600 h-[3px] w-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
