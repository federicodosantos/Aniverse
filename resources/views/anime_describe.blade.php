<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
                        <pre>{{ print_r($item->character_item) }}</pre>
        <h1 class="pt-2 pb-6 text-center text-3xl font-bold tracking-tight text-white">
            {{ $item->title }}
        </h1>
        <div class="flex flex-row gap-2 py-4 pb-24">
            <img src="{{ $item->photo_link }}" alt="" class="bg-white h-96 w-64 bg-opacity-20">
            <div class="ml-10 bg-white h-96 w-[770px] bg-opacity-20 rounded-3xl">
                <h5 class="pl-2 text-2xl font-bold tracking-tight text-white text-center">{{$item->title}} Description:</h5>
                <script src="{{ asset('js/rating.js') }}"></script>
                <div class="mx-auto py-2 justify-center items-center text-center">
                    <div id="ratingStars"></div> <!-- Tempat untuk menampilkan bintang rating -->
                    <script>
                        // Memanggil getRatingStars() setelah file rating.js dimuat
                        document.addEventListener('DOMContentLoaded', function () {
                            const ratingContainer = document.getElementById('ratingStars');
                            const rating = {{ $item->rating }};
                            ratingContainer.innerHTML = getRatingStars(rating);
                        });
                    </script>
                </div>
                <div class="pl-2"></div>
                <div class="pt-2 flex flex-row text-white">
                    <div class="pl-4 w-2/5 flex flex-col">
                        <div class="flex flex-row py-1"><p class="font-bold">Authors:</p><p>{{ $item->author }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Years:</p><p>{{ $item->year }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Episode:</p><p>{{ $item->episodes }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Status:</p><p>{{ $item->status }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Studio:</p><p>{{ $item->studio }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Genre:</p><p>{{ $item->genre }}</p></div>
                        <div class="flex flex-row py-1"><p class="font-bold">Ages:</p><p>17+</p></div>
{{--                        @php--}}
{{--                            $hasCharacters = count($item->character_item) > 0;--}}
{{--                        @endphp--}}

{{--                        @if($hasCharacters)--}}
{{--                            <div class="flex flex-col">--}}
{{--                                <p class="font-bold py-1">Characters:</p>--}}
{{--                                @foreach($item->character_item as $character)--}}
{{--                                    <p>{{ $character->name }}</p>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @endif--}}

                    </div>
                    <div class=" pr-3" >
                        <div class="h-[270px] bg-blue-600 w-1"></div>
                    </div>
                    <div class="w-1/2">
                        <div class="flex flex-row w-full">
                            <div class="pt-2" alt="Deskripsi"></div>
                            <div class="flex flex-col pl-8">
                                <p class="font-bold">Synopsis</p>
                                <p class="whitespace-normal overflow-wrap break-words w-full">
                                    {{ $item->synopsis }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
