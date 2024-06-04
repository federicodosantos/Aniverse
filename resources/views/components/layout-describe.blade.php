<x-layout>
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
<h1 class="pt-2 pb-6 text-center text-3xl font-bold tracking-tight text-white">
    {{$item}}
    </h1>
    <div class="flex flex-row gap-2 py-4 pb-24">
        <img src="#" alt="" class="bg-white h-96 w-64 bg-opacity-20">
        <div class="ml-10 bg-white h-96 w-[770px] bg-opacity-20 rounded-3xl">
            <h5 class="pl-2 text-2xl font-bold tracking-tight text-white text-center">{{$title}} Description:</h5>
            <div class="mx-auto py-2 justify-center items-center text-center">
                          <span class="fa fa-star text-amber-400"></span>
                          <span class="fa fa-star"></span>
                          <span class="fa fa-star"></span>
                          <span class="fa fa-star"></span>
                          <span class="fa fa-star"></span>
                      </div>
            <div class="pl-2"></div>
            <div class="pl-2 pt-2 flex flex-row text-white">
                <div class="pl-4 flex flex-col">
                    <div class="flex flex-row py-1"><p class="font-bold">Authors:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Years:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Episode:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Status:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Studio:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Genre:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Ages:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Score:</p><p>Halo</p></div>
                    <div class="flex flex-row py-1"><p class="font-bold">Character:</p><p>Halo</p></div>
                </div>
                <!-- <div class="h-[300px] bg-blue-600 w-[5px]"></div> -->
                <div class="mx-auto">
                    <div class="flex flex-row">
                        <div class="pt-2"><div class="h-[270px] bg-blue-600 w-1"></div></div>
                        <div class="flex flex-col pl-8">
                            <p class="font-bold">Sinopsis</p>
                            <p>Deskripsi</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</x-layout>
