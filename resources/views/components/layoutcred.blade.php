<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>ANIVERSE</title>
</head>
<body class="h-max">
    <div class="min-h-full bg-zinc-800 h-full">
        <x-header>ANIVERSE</x-header>
        <x-navbar></x-navbar>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>