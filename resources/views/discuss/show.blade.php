<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="rounded-lg p-6">
            <h1 class="text-white text-left text-3xl font-bold">{{ $discuss->title }}</h1>
            <span class="block text-white text-sm">{{ $discuss->description }}</span>
            <p class="text-gray-400 text-sm pb-2">{{ $discuss->created_at }}</p>
            <p class="text-gray-400 text-sm pb-2">Created By: {{ $discuss->user->name }}</p>
            <div class="h-[3px] bg-blue-600"></div>
            <div class="flex flex-col">
                <div class="pl-12 max-h-60 mb-4 p-4 rounded-md" style="overflow-y: auto; scrollbar-width: thin;">
                    @foreach($discuss->comments as $comment)
                        <div class="pb-1 mb-1" style="overflow-y: auto; scrollbar-width: thin;">
                            <p class="text-white"><strong>{{ $comment->user->name }} - </strong> {{ $comment->comment }}</p>
                            <p class="text-gray-400 text-sm">{{ $comment->created_at }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- Add Comment -->
                @auth
                    <div class="py-2">
                        <form action="{{ route('comment.create', $discuss->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="discussion_id" value="{{ $discuss->id }}">
                            <div class="border border-2 border-blue-600 flex flex-row block w-1/2 text-left px-4 py-2 text-white rounded-l-md bg-opacity-10 transition duration-200">
                                <textarea name="comment" class="h-12 bg-white bg-opacity-10 w-full px-3 text-white border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a comment..."></textarea>
                                <button type="submit" class="px-4 bg-blue-600 text-white rounded-r-md">
                                    <svg class="w-4 h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="py-2 text-white">
                        <p>Anda harus login untuk dapat menambahkan komentar.</p>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</x-layout>
