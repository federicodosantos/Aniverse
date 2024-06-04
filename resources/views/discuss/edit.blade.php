<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="rounded-lg p-6">
            <h1 class="text-white text-center text-3xl font-bold mb-4">Edit Topic</h1>
            <form action="{{ route('topics.update', $topic['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-300 font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ $topic['title'] }}" class="w-full px-3 py-2 rounded-md bg-gray-800 text-white" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-300 font-bold mb-2">Content</label>
                    <textarea name="content" id="content" rows="5" class="w-full px-3 py-2 rounded-md bg-gray-800 text-white" required>{{ $topic['content'] }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">Update Topic</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>