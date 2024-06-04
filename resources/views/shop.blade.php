<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-3 justify-center items-center text-center">
            <div class="box-content h-[620px] bg-white bg-opacity-10 rounded-3xl">
                <div class="pt-2 flex flex row">
                    <h1 class="mx-auto text-3xl font-bold pl-16 tracking-tight text-white">SHOP</h1>
                    <a href="/shop-create"><div class="pr-4 py-1"><div  class="px-4 py-2 bg-blue-600 w-10 text-white rounded-md"><p>+</p></div></a></div>

            </div>
                <div class="h-[5px] bg-blue-600"></div>
                <div id="productContainer" class="flex flex-row gap-4 px-10 pt-6"></div>
            </div>
        </div>
    </div>

    <script>
        // Mengambil data produk dari API saat dokumen dimuat
        window.onload = function() {
            fetch('{{ route("product.list") }}')
                .then(response => response.json())
                .then(data => {
                    const productContainer = document.getElementById('productContainer');

                    // Iterasi melalui data produk dan tampilkan di dalam div
                    data.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.innerHTML = `
                            <a href="/product/${product.id}" class="rounded-2xl mx-auto bg-white h-44 w-32 bg-opacity-20">
                                <img src="${product.photo_link}" alt="${product.name}" class="rounded-lg">
                            </a>
                            <div class="text-center flex flex-col gap-2 pt-1 text-white">
                                <p class="mx-auto w-32">${product.name}</p>
                                <p class="mx-auto w-32">Rp.${product.price}</p>
                                <a href="/product/${product.id}" class="mx-auto w-32 bg-blue-800 w-24 rounded-2xl">BUY</a>
                            </div>
                        `;
                        productContainer.appendChild(productDiv);
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        };
    </script>
</x-layout>

