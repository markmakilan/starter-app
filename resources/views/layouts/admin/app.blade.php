<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full">
    <div x-data="main">
        @livewire('layout.admin.sidebar')
    
        <div class="flex flex-col h-screen pl-[76px]" x-bind:class="{'pl-64': sidebar, 'pl-[76px]': !sidebar}">
            @livewire('layout.admin.navbar')
    
            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-5 overflow-y-auto scrollbar">
                {{ $slot }}
            </main>
        </div>
    
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('main', () => ({
                    sidebar: false,
         
                    toggleSidebar() {
                        this.sidebar = ! this.sidebar
                    },
                }))
            })
        </script>
    </div>
</body>

</html>