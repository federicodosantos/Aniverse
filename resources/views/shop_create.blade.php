<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-8 justify-center items-center text-center">
            <div class="box-content h-auto w-full bg-white bg-opacity-10 rounded-3xl p-6">
                <div class="flex flex-row">
                    <a href="/shop">
                        <button class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-r-lg rounded-t-lg hover:bg-blue-700">
                            <svg class="w-8 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                    </a>
                    <div class="mx-auto flex justify-center items-center text-center">
                        <h1 class="pl-10 py-3 pr-12 text-3xl font-bold tracking-tight text-white">Create New Product</h1>
                    </div>
                </div>
                <div class="h-[5px] bg-blue-600"></div>
                <div class="flex flex-row gap-2 py-4 w-full">
                    <div class="px-8 relative" alt="Bagian file upload">
                        <form action="/upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-white h-80 w-64 bg-opacity-70 rounded-3xl flex items-center justify-center">
                                <img id="preview-image" src="#" alt="Preview" class="hidden h-full w-full object-cover rounded-3xl">
                                <label for="file-upload" class="absolute inset-0 flex items-center justify-center cursor-pointer">

                                </label>
                            </div>
                            <input id="file-upload" name="file" type="file" class="hidden" onchange="previewImage(event)">
                            <div class="flex items-center justify-center w-16 h-16 bg-blue-500 rounded-3xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </form>
                    </div>
                    <div class="ml-10 w-7/12">
                        <form action="/save-product" method="POST">
                            @csrf
                            <h5 class="px-2 text-2xl font-bold tracking-tight text-white text-center">Product Description:</h5>
                            <div class="py-3 flex flex-row text-white">
                                <div class="flex flex-col w-1/2">
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Penjual: {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Nama Barang:</p>
                                        <input type="text" name="nama_barang" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Garansi:</p>
                                        <input type="text" name="garansi" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Ukuran:</p>
                                        <input type="text" name="ukuran" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Berat:</p>
                                        <input type="text" name="berat" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Jenis:</p>
                                        <input type="text" name="jenis" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Bahan:</p>
                                        <input type="text" name="bahan" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Warna:</p>
                                        <input type="text" name="warna" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                    <div class="flex flex-row py-1">
                                        <p class="font-bold w-32">Stok:</p>
                                        <input type="text" name="stok" class="text-black flex-1 rounded-lg p-1">
                                    </div>
                                </div>
                            </div>
                            <div class="h-[2px] bg-blue-600 w-full"></div>
                            <div class="flex flex-row py-8">
                                <div class="mx-auto flex flex-col">
                                    <div>
                                        <input type="text" name="nama_product" class="text-2xl font-bold text-black p-2 rounded-lg" placeholder="Nama Product...">
                                    </div>
                                    <div>
                                        <input type="text" name="harga" class="text-4xl font-bold text-black p-2 rounded-lg" placeholder="Rp.....">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- buatkan agar img bisa upload file menggunakan laravel blade, tailwind. (buatkan desainnya saja, tombolnya berwarna biru) -->
            </div>
        </div>
    </div>
</x-layout>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-image');
            output.src = reader.result;
            output.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
