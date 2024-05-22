<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $item->title }}</title>
</head>

<body>
    <h1>{{ $item->title }}</h1>
    <img style="width: 100px" src="{{ $item->photo_link }}" alt="{{ $item->title }}">
    <p><strong>Synopsis:</strong> {{ $item->synopsis }}</p>
    <p><strong>Year:</strong> {{ $item->year }}</p>
    <p><strong>Episodes:</strong> {{ $item->episodes }}</p>
    <p><strong>Studio:</strong> {{ $item->studio }}</p>
    <p><strong>Author:</strong> {{ $item->author }}</p>
    <p><strong>Status:</strong> {{ $item->status }}</p>
    <p><strong>Genre:</strong> {{ $item->genre }}</p>
    <p><strong>Rating:</strong> {{ $item->rating }}</p>

    <h2>Characters:</h2>
    <ul>
        @foreach ($item->characterItem as $character)
            <li>{{ $character->name }}</li>
        @endforeach
    </ul>
</body>

</html>
</body>

</html>
