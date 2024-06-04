<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="mx-auto">
            <div class="py-3 justify-center items-center text-center">
                <div class="box-content h-[330px] bg-white bg-opacity-10 rounded-md">
                    <div class="flex flex row">
                        <h1 class="pl-12 mx-auto text-3xl font-bold tracking-tight text-white">HOT ANIME</h1>
                        <a href="/animes">
                            <button
                                class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-l-lg rounded-t-lg hover:bg-blue-700">
                                <svg class="w-4 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div class="h-[5px] bg-blue-600 "></div>
                    <div id="hot-anime-list" class="flex flex-row gap-2 pt-4">
                        <!-- Hot anime items will be appended here by JavaScript -->
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/rating.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    fetch('{{ route("hot-anime") }}')
                        .then(response => response.json())
                        .then(data => {
                            const hotAnimeList = document.getElementById('hot-anime-list');
                            hotAnimeList.innerHTML = '';
                            data.forEach(anime => {
                                const animeElement = document.createElement('div');
                                animeElement.classList.add('mx-auto', 'bg-white', 'h-52', 'w-44', 'bg-opacity-20');
                                animeElement.innerHTML = `
                    <a href="/anime/${anime.id}">
                        <img src="${anime.photo_link}" alt="${anime.title}" class="w-full h-52 object-cover">
                        <p>${anime.title}</p>
                        <div>
                            ${getRatingStars(anime.rating)}
                        </div>
                    </a>
                `;
                                hotAnimeList.appendChild(animeElement);
                            });
                        });
                });
            </script>

            <div class="py-3 justify-center items-center text-center">
                <div class="box-content h-[330px] bg-white bg-opacity-10 rounded-md">
                    <div class="flex flex-row">
                        <h1 class="pl-12 mx-auto text-3xl font-bold tracking-tight text-white">HOT MANGA</h1>
                        <a href="/mangas">
                            <button
                                class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-l-lg rounded-t-lg hover:bg-blue-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div class="h-[5px] bg-blue-600"></div>
                    <div id="hot-manga-list" class="flex flex-row gap-2 pt-4">
                        <!-- Hot manga items will be appended here by JavaScript -->
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/rating.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    fetch('{{ route("hot-manga") }}')
                        .then(response => response.json())
                        .then(data => {
                            const hotMangaList = document.getElementById('hot-manga-list');
                            hotMangaList.innerHTML = '';
                            data.forEach(manga => {
                                const mangaElement = document.createElement('div');
                                mangaElement.classList.add('mx-auto', 'bg-white', 'h-52', 'w-44', 'bg-opacity-20', 'rounded-md');
                                mangaElement.innerHTML = `
                        <a href="/manga/${manga.id}">
                            <img src="${manga.photo_link}" alt="${manga.title}" class="w-full h-52 object-cover">
                            <p>${manga.title}</p>
                            <div class="p-2 flex justify-center">
                                ${getRatingStars(manga.rating)}
                            </div>
                        </a>
                    `;
                                hotMangaList.appendChild(mangaElement);
                            });
                        });
                });
            </script>

            <div class="mx-auto flex flex-row gap-10 py-5 justify-center items-center">
                <div class="box-content h-[440px] w-full bg-white bg-opacity-10 rounded-md">
                    <div class="flex flex-row">
                        <h1 class="pl-12 mx-auto text-3xl font-bold tracking-tight text-white text-center">SHOP</h1>
                        <a href="/shop">
                            <button
                                class="flex items-center px-4 py-2 h-full font-semibold text-white bg-white bg-opacity-0 rounded-l-lg rounded-t-lg hover:bg-blue-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div class="h-[5px] bg-blue-600 "></div>
                    <div id="shop-products" class=" flex flex-row pt-4">
                    </div>
                </div>
            </div>
             <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        fetch('{{ route("home-product") }}')
                            .then(response => response.json())
                            .then(data => {
                                const shopProductsContainer = document.getElementById('shop-products');
                                data.forEach(product => {
                                    const productElement = document.createElement('div');
                                    productElement.classList.add('mx-auto', 'bg-white', 'h-64', 'w-60', 'bg-opacity-20', 'rounded-3xl');
                                    productElement.innerHTML = `
                        <a href="/product/${product.id}">
                        <img src="${product.photo_link}" alt="${product.name}" class="w-full h-full object-cover rounded-3xl">
                        <p class="text-center">${product.name}</p>
                        <p class="text-center">Rp.${product.price}</p>
                        </a>
                        <div class="text-center flex flex-row gap-2 pt-4 justify-center items-center">
                            <div class="mx-auto w-44"><a href="/product/${product.id}"><p class="mx-auto bg-blue-800 w-24 rounded-2xl">BUY</p></a></div>
                    `;
                                    shopProductsContainer.appendChild(productElement);
                                });
                            });
                    });
             </script>
        </div>
    </div>
</x-layout>
