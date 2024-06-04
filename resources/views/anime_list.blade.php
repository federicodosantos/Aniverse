<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="py-3 justify-center items-center text-center">
            <div class="box-content h-[650px] bg-white bg-opacity-10 rounded-3xl">
                <div class="flex flex row">
                    <h1 class="mx-auto text-3xl font-bold tracking-tight text-white">ANIME LIST</h1>
                </div>
                <div class="h-[5px] bg-blue-600 "></div>
                <div id="anime-list" class="flex flex-wrap justify-center gap-4 px-10 pt-6"></div>
            </div>
        </div>
    </div>
</x-layout>

<script src="{{ asset('js/rating.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    fetch( "{{ route('animes') }}")
        .then(response => response.json())
        .then(data => {
            const animeList = document.getElementById('anime-list');
            let html = '';

            data.forEach(anime => {
                html += `
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 w-44">
                            <!-- Gambar -->
                            <a href="/anime/${anime.id}" class="block h-44 w-full mb-2">
                                <img src="${anime.photo_link}" alt="${anime.title}" class="h-full w-full object-cover rounded">
                            </a>
                            <!-- Judul Anime -->
                            <div class="text-center text-white mb-2">
                                <p>${anime.title}</p>
                            </div>
                            <!-- bintang -->
                            <div class="text-center">
                                ${getRatingStars(anime.rating)}
                            </div>
                        </div>
                    `;
            });

            animeList.innerHTML = html;
        })
        .catch(error => {
            console.error('Error fetching data:', error); // Improved error logging
            const animeList = document.getElementById('anime-list');
            animeList.innerHTML = '<p class="text-white">Failed to load anime list. Please try again later.</p>';
        });
    });
</script>
