<x-layout>
    <div class="text-white mx-auto max-w-7xl py-6 sm:px-6 lg:px-20">
        <div class="rounded-lg p-6">
            <h1 class="text-white text-center text-3xl font-bold mb-4">Add New Discuss</h1>
            <form action="{{ route('discuss.create') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-white mb-2" for="title">Title</label>
                    <input type="text" id="title" name="title" class="w-full px-3 py-2 text-black border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-white mb-2" for="preview">Content</label>
                    <input type="text" id="description" name="description" class="w-full px-3 py-2 text-black border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Submit</button>
            </form>
        </div>
    </div>
</x-layout>
