<div x-data="main">
    @livewire('layout.admin.sidebar')

    <div class="flex flex-col h-screen" x-bind:class="{'pl-64': sidebar, 'pl-[72px]': !sidebar}">
        @livewire('layout.admin.navbar')

        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-5 overflow-y-scroll scroll-bar">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('main', () => ({
                sidebar: true,
     
                toggleSidebar() {
                    this.sidebar = ! this.sidebar
                },
            }))
        })
    </script>
</div>