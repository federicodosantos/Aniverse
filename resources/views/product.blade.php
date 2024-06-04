<x-layout>
<div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
    <div class="py-8 justify-center items-center text-center">
          <div class="box-content h-[430px] w-full bg-white bg-opacity-10 rounded-3xl">
            <div class="flex flex row">
                <a href="/shop">
                    <button class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-r-lg rounded-t-lg hover:bg-blue-700">
                        <svg class="w-8 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                </a>
                <div class="mx-auto flex flex-row relative flex justify-end items-end w-11/12">
                    <div class="mx-auto"></div>
                    <div class="mx-auto text-right ">
                        <h1 class="text-right py-3 text-3xl font-bold tracking-tight text-white">{{ $product->name }}</h1>
                    </div>
                    <div class="mx-auto justify-end">
                        <div class="absolute top-3 right-0 mt-2 mr-4">
                            <div class="mx-auto relative text-left">
                                <button type="button" class="flex items-center justify-right w-6 h-6 text-white hover:text-gray-400 focus:outline-none" id="options-menu">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" id="menu">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                                        <form method="POST" action="" class="block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-[5px] bg-blue-600 "></div>
            <div class="flex flex-row gap-2 py-4 pb-24 w-full">
                <div class="px-8"><img src="{{ $product->photo_link }}" alt="" class="bg-white h-80 w-64 bg-opacity-20 rounded-3xl"></div>
                <div class="ml-10 w-7/12">
                    <h5 class="px-2 text-2xl font-bold tracking-tight text-white text-center">Description:</h5>
                    <div class="mx-auto py-2 justify-center items-center text-center">

                            </div>
                    <div class="py-3 flex flex-row text-white">
                        <div class=" flex flex-col">
                            <div class="flex flex-row py-1"><p class="font-bold">Penjual:</p><p>{{ $product->user->name }}</p></div>
                            <div class="flex flex-row py-1"><p class="font-bold">Nama Barang:</p><p>{{ $product->name }}</p></div>
                            <div class="flex flex-row py-1"><p class="font-bold">Garansi:</p><p>30 Hari</p></div>
                        </div>
                        <!-- <div class="h-[300px] bg-blue-600 w-[5px]"></div> -->
                        <div class="mx-auto">
                            <div class="flex flex-row py-1"><p class="font-bold">Jenis:</p><p>Action Figure</p></div>
                            <div class="flex flex-row py-1"><p class="font-bold">Bahan:</p><p>PVC</p></div>
                            <div class="flex flex-row py-1"><p class="font-bold">Stock:</p><p>{{ $product->stock }}</p></div>
                        </div>
                    </div>
                    <div class="h-[2px] bg-blue-600 w-full"></div>
                    <div class="flex flex-row py-8">
                        <div class="mx-auto flex flex-col">
                            <div class=""><p class="text-2xl font-bold">{{  $product->name }}</p></div>
                            <div class=""><p class="text-4xl font-bold">Rp.{{  $product->price }}</p></div>
                        </div>
                        <div class="py-4 mx-auto w-44">
                            <form action="{{ route('order.store', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="w-full px-8 py-3 font-semibold text-white bg-blue-600 rounded-full hover:bg-blue-700">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
    <script>
        document.getElementById('options-menu').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</x-layout>
