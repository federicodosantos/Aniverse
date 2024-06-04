<x-layoutcred>
<div class="mx-auto max-w-7xl pb-16 py-6 sm:px-6 lg:px-20 h-full">
    <div class="py-5 bg-center">
    <h1 class="text-3xl font-bold tracking-tight text-white text-center pb-2">Profile Account</h1>
    <div class="flex py-3 justify-center items-center">
          <div class="h-[400px] bg-white bg-opacity-20 rounded-2xl w-[450px]">
                <div class="px-4 py-8 sm:px-6 lg:px-10">
                    <div class="flex flex-col">
                        <div class="mx-auto"><img class="h-40 w-40 rounded-full" src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" alt=""></div>
                        <div class="py-2">
                            <h2 class="text-white">Nama</h2>
                            <div class="box-content h-8 bg-white bg-opacity-10 rounded-md">
                                <p class="text-white px-2 py-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <h2 class="text-white">Email</h2>
                            <div class="box-content h-8 bg-white bg-opacity-10 rounded-md">
                                <p class="text-white px-2 py-1">{{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                </div>
          </div>
    </div>
</div>
</x-layoutcred>


