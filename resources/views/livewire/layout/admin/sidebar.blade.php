<div>
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div 
        class="relative z-50" 
        role="dialog" 
        aria-modal="true" 
        x-show="!sidebar">

        <div class="fixed h-full flex">
            <div 
                class="relative flex w-full flex-1"
                x-show="!sidebar"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full">
                <div 
                    class="absolute left-full top-0 flex w-16 justify-center pt-5"
                    x-show="!sidebar"
                    x-transition:enter="ease-in-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col gap-y-5 overflow-y-auto bg-gray-900 px-4 pb-4 ring-1 ring-white/10 w-[72px] rounded-md ml-1 my-1">
                    <div class="flex h-16 shrink-0 items-center">
                        <x-application-logo class="h-8 w-auto mx-auto fill-current text-gray-500" />
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="space-y-1">
                                    <li>
                                        <!-- Current: "bg-gray-800 text-white", Default: "text-gray-500 hover:text-white hover:bg-gray-800" -->
                                        <a 
                                            wire:navigate href="/admin/dashboard"
                                            @class([
                                                'group flex gap-x-3 rounded-md p-2 text-sm text-gray-500 leading-6 font-semibold hover:text-white hover:bg-gray-800', 
                                                'bg-gray-800 text-white' => $current_route_name == 'admin.dashboard'
                                            ])>
                                            <x-icon.home class="h-6 w-6 shrink-0" fill="currentColor" />
                                        </a>
                                    </li>
                                    <li>
                                        <a 
                                            wire:navigate href="/admin/user"
                                            @class([
                                                'group flex gap-x-3 rounded-md p-2 text-sm text-gray-500 leading-6 font-semibold hover:text-white hover:bg-gray-800', 
                                                'bg-gray-800 text-white' => $current_route_name == 'admin.user'
                                            ])>
                                            <x-icon.users-two class="h-6 w-6 shrink-0" stroke="currentColor" />
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="mt-auto">
                                <a href="#"
                                    class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-500 hover:bg-gray-800 hover:text-white">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="fixed inset-y-0 z-50 flex w-64 flex-col" x-show="sidebar">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div 
            class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4 rounded-md ml-1 my-1"
            x-show="sidebar"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="flex h-16 shrink-0 items-center">
                <x-application-logo class="h-6 w-6 fill-current text-gray-500" />
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <!-- Current: "bg-gray-800 text-white", Default: "text-gray-500 hover:text-white hover:bg-gray-800" -->
                                <a 
                                    wire:navigate href="/admin/dashboard"
                                    @class([
                                        'group flex gap-x-3 rounded-md p-2 text-sm text-gray-500 leading-6 font-semibold hover:text-white hover:bg-gray-800', 
                                        'bg-gray-800 text-white' => $current_route_name == 'admin.dashboard'
                                    ])>
                                    <x-icon.home class="h-6 w-6 shrink-0" fill="currentColor" />
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a 
                                    wire:navigate href="/admin/user"
                                    @class(['
                                        group flex gap-x-3 rounded-md p-2 text-sm text-gray-500 leading-6 font-semibold hover:text-white hover:bg-gray-800',
                                        'bg-gray-800 text-white' => $current_route_name == 'admin.user'
                                    ])>
                                    <x-icon.users-two class="h-6 w-6 shrink-0" stroke="currentColor" />
                                    <span>User</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="mt-auto">
                        <a href="#"
                            class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-500 hover:bg-gray-800 hover:text-white">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
