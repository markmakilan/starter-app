<div x-data="navbar">
    <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 px-4 sm:gap-x-6 sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-gray-700" x-on:click="toggleSidebar">
            <span class="sr-only">Open sidebar</span>
            <x-icon.menu class="w-6 h-6" stroke="currentColor" />
        </button>

        <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
            <div class="flex-1"></div>
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
                        <span class="hidden md:flex md:items-center">
                            <span class="ml-4 text-sm font-semibold leading-6 text-gray-700" aria-hidden="true">{{ $name }}</span>
                            <x-icon.caret-down class="ml-2 h-4 w-4 text-gray-700" fill="currentColor" />
                        </span>
                        <div class="block md:hidden">
                            <x-icon.ellipsis-v class="w-4 h-4 text-gray-700" fill="currentColor" />
                        </div>
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