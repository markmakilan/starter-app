<div x-data="navbar">
    <div
        class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 px-4 sm:gap-x-6 sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-gray-700" x-on:click="toggleSidebar">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
            <form class="relative flex flex-1" action="#" method="GET"></form>
            <div class="flex items-center gap-x-4 lg:gap-x-6">
                <!-- Profile dropdown -->
                <div class="relative">
                    <button 
                        type="button" 
                        class="-m-1.5 flex items-center p-1.5" 
                        id="user-menu-button"
                        aria-expanded="false" 
                        aria-haspopup="true"
                        x-on:click="toggleDropdown">
                        <span class="sr-only">Open user menu</span>
                        <span class="hidden lg:flex lg:items-center">
                            <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">{{ $name }}</span>
                            <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div 
                        class="absolute right-0 z-10 mt-4 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                        role="menu" 
                        aria-orientation="vertical" 
                        aria-labelledby="user-menu-button" 
                        tabindex="-1"
                        x-show="dropdown"
                        x-on:click.away="dropdown = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-out duration-100"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-100" role="menuitem"
                            tabindex="-1" id="user-menu-item-0">Your profile</a>
                        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-100" role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('navbar', () => ({
                dropdown: false, 
                
                toggleDropdown() { 
                    this.dropdown = !this.dropdown 
                }
            }))
        })
    </script>
</div>