<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ANIVERSE</title>
</head>
<body class="h-full">
    <div class="min-h-full bg-zinc-800">
    <x-header>ANIVERSE</x-header>
    <x-navbar></x-navbar>
    <main>
        <!-- <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-20"> -->
        {{ $slot }}
        <!-- </div> -->
    </main>
    
    </div>
    <x-footer></x-footer>
</body>
</html>