<div x-data="main">
    @livewire('layout.admin.sidebar')

    <div x-bind:class="sidebar ? 'pl-64' : 'pl-[72px]'">
        @livewire('layout.admin.navbar')

        <main class="px-4 sm:px-6 lg:px-8 py-5">
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