<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="rounded-lg p-6">
            <h1 class="text-white text-center text-3xl font-bold mb-4">DISCUSS</h1>
            <div class="mb-4 px-4">
                <a href="{{ route('discuss.create.form') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">Add New Topic</a>
            </div>
            <div>
                @foreach($discussions as $discuss)
                <div class="relative block w-full text-left px-4 py-2 text-white rounded-md mb-2 hover:bg-blue-700 hover:bg-opacity-10 transition duration-200">
                    <a href="{{ route('discuss.show', $discuss['id']) }}" class="w-full block">
                        <span class="block text-gray-300 text-sm">{{ $discuss['user']['name'] }}</span>
                        <span>{{ $discuss['title'] }}</span>
                        <span class="block text-gray-300 text-sm">{{ $discuss['description'] }}</span>
                        <span><small>{{ $discuss['created_at'] }}</small></span>
                        <div class="h-[3px] bg-blue-600 "></div>
                    </a>
                    <div class="absolute top-0 right-0 mt-2 mr-4">
                        <div class="relative inline-block text-left">
                            <button type="button" class="flex items-center justify-center w-6 h-6 text-white hover:text-gray-400 focus:outline-none" id="options-menu-{{ $discuss['id'] }}" aria-haspopup="true" aria-expanded="true">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                </svg>
                            </button>
                            <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" id="menu-{{ $discuss['id'] }}">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-{{ $discuss['id'] }}">
                                    <a href="{{ route('discuss.update', $discuss['id']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                                    <form method="POST" action="{{ route('discuss.destroy', $discuss['id']) }}" class="block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById('options-menu-{{ $discuss['id'] }}').addEventListener('click', function() {
                        var menu = document.getElementById('menu-{{ $discuss['id'] }}');
                        menu.classList.toggle('hidden');
                    });
                </script>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
