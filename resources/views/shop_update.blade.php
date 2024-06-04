<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-8 justify-center items-center text-center">
            <div class="box-content h-[430px] w-full bg-white bg-opacity-10 rounded-3xl">
                <div class="flex flex-row">
                    <!-- Tombol kembali -->
                    <a href="/shop" class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-r-lg rounded-t-lg hover:bg-blue-700">
                        <svg class="w-8 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div class="mx-auto flex justify-center items-center text-center">
                        <h1 class="pl-10 py-3 pr-12 text-3xl font-bold tracking-tight text-white">Edit Produk</h1>
                    </div>
                    <!-- Tombol edit -->
                    <div class="p-3">
                        <div class="flex pl-3 bg-blue-500 rounded-lg w-12">
                            <a href="#" class="edit-btn">
                                <div class="edit-icon">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current text-white">
                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                    </svg>
                                </div>
                                <span class="edit-text">Edit</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="h-[5px] bg-blue-600"></div>
                <div class="flex flex-row gap-2 py-4 pb-24 w-full">
                    <div class="px-8 relative">
                        <img src="{{ $product->photo_link }}" alt="{{ $product->name }}" class="bg-white h-80 w-64 bg-opacity-70 rounded-3xl">
                        <label for="file-upload" class="absolute inset-0 flex items-center justify-center cursor-pointer">
                            <div class="flex items-center justify-center w-16 h-16 bg-blue-500 rounded-full">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </label>
                        <input type="file" id="file-upload" name="photo_link" class="hidden" accept="image/*">
                    </div>

                    <div class="ml-10 w-7/12">
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h5 class="px-2 text-2xl font-bold tracking-tight text-white text-center">Product Description:</h5>
                            <div class="mx-auto py-2 justify-center items-center text-center">
                                <!-- Rating stars -->
                            </div>
                            <div class="py-3 flex flex-row text-white">
                                <div class="flex flex-col">
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold">Penjual:</p>
                                        <input type="text" name="seller" value="{{ $product->seller }}" class="ml-2 bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold">Nama Barang:</p>
                                        <input type="text" name="name" value="{{ $product->name }}" class="ml-2 bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold">Garansi:</p>
                                        <input type="text" name="warranty" value="{{ $product->warranty }}" class="ml-2 bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold">Jenis:</p>
                                        <input type="text" name="type" value="{{ $product->type }}" class="ml-2 bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold">Bahan:</p>
                                        <input type="text" name="material" value="{{ $product->material }}" class="ml-2 bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                </div>
                            </div>
                            <div class="h-[2px] bg-blue-600 w-full"></div>
                            <div class="flex flex-row py-8">
                                <div class="mx-auto flex flex-col">
                                    <div class="">
                                        <p class="text-2xl font-bold">{{ $product->name }}</p>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <p class="text-4xl font-bold">Rp</p>
                                        <input type="number" name="price" value="{{ $product->price }}" class="ml-2 text-4xl font-bold bg-white bg-opacity-10 rounded-md px-2 py-1 text-white">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
