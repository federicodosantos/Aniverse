<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-3 justify-center items-center text-center">
            <div class="box-content h-[650px] bg-white bg-opacity-10 rounded-3xl">
                <div class="flex flex row">
                    <h1 class="mx-auto text-3xl font-bold tracking-tight text-white">MANGA LIST</h1>
                </div>
                <div class="h-[5px] bg-blue-600 "></div>
                <div id="manga-list" class="flex flex-wrap justify-center gap-4 px-10 pt-6"></div>
            </div>
        </div>
    </div>
</x-layout>

<script src="{{ asset('js/rating.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch( "{{ route('mangas') }}")
            .then(response => response.json())
            .then(data => {
                const mangaList = document.getElementById('manga-list');
                let html = '';

                data.forEach(manga => {
                    html += `
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 w-44">
                            <!-- Gambar -->
                            <a href="/manga/${manga.id}" class="block h-44 w-full mb-2">
                                <img src="${manga.photo_link}" alt="${manga.title}" class="h-full w-full object-cover rounded">
                            </a>
                            <!-- Judul manga -->
                            <div class="text-center text-white mb-2">
                                <p>${manga.title}</p>
                            </div>
                            <!-- bintang -->
                            <div class="text-center">
                                ${getRatingStars(manga.rating)}
                            </div>
                        </div>
                    `;
                });

                mangaList.innerHTML = html;
            })
            .catch(error => {
                console.error('Error fetching data:', error); // Improved error logging
                const mangaList = document.getElementById('manga-list');
                mangaList.innerHTML = '<p class="text-white">Failed to load manga list. Please try again later.</p>';
            });
    });
</script>
