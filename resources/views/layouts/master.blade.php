<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body>
<div x-data="{ sidebarOpen: true, darkMode: true }"
     :class="{ 'dark': darkMode }">

    <div class="flex min-h-screen bg-gray-100 dark:bg-[#0f172a]">

        @include('partials.sidebar')

        <div class="flex-1 min-w-0">
            @include('partials.topbar')

            <main class="p-6 min-h-[calc(100vh-88px)] bg-gray-100 dark:bg-[#0f172a]">
                @yield('content')
            </main>
        </div>

    </div>
</div>
</body>
</html>
