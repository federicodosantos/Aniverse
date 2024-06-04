<form action="{{ route('topics.destroy', $topic['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded-md">Delete</button>
</form>