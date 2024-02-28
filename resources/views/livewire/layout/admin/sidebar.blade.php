<div x-data="sidebar">
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
                <div class="flex flex-col gap-y-5 bg-gray-900 pb-4 ring-1 ring-white/10 w-[72px]">
                    <div class="flex h-16 shrink-0 items-center">
                        <x-application-logo class="h-8 w-auto mx-auto fill-current text-gray-300" />
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="space-y-1">
                                    <li>
                                        <!-- Current: "bg-gray-800 text-white", Default: "text-gray-300 hover:text-white hover:bg-gray-800" -->
                                        <a 
                                            href="/admin/dashboard"
                                            class="flex gap-x-3 rounded-md p-2 text-sm text-gray-300 leading-6 font-semibold mx-4 hover:text-gray-100 hover:bg-gray-800"
                                            x-bind:class="{'bg-gray-800 text-gray-100' : current_route_name == 'admin.dashboard'}">
                                            <x-icon.home class="h-6 w-6 shrink-0" fill="currentColor" />
                                        </a>
                                    </li>
                                    <li>
                                        <a 
                                            href="/admin/user"
                                            class="flex gap-x-3 rounded-md p-2 text-sm text-gray-300 leading-6 font-semibold mx-4 hover:text-gray-100 hover:bg-gray-800"
                                            x-bind:class="{'bg-gray-800 text-gray-100' : current_route_name == 'admin.user'}">
                                            <x-icon.users-two class="h-6 w-6 shrink-0" stroke="currentColor" />
                                        </a>
                                    </li>
                                    <li class="group relative">
                                        <label 
                                            class="flex gap-x-3 rounded-md p-2 text-sm text-gray-300 cursor-pointer leading-6 font-semibold mx-4 hover:text-gray-100 hover:bg-gray-800 group-hover:bg-gray-800"
                                            x-bind:class="{'bg-gray-800 text-gray-100' : current_route_name == 'admin.module'}">
                                            <x-icon.settings class="h-6 w-6 shrink-0" stroke="currentColor" />
                                        </label>

                                        <div class="absolute hidden bg-gray-800 rounded-r-md w-[224px] top-0 left-[72px] group-hover:block">
                                            <ul class="space-y-1">
                                                <li>
                                                    <label class="flex justify-between items-center gap-x-3 rounded-r-md px-4 py-2 text-sm text-gray-300 leading-6 font-semibold">
                                                        <span>System</span>
                                                        <x-icon.caret-down class="h-4 w-4 shrink-0" fill="currentColor" />
                                                    </label>
                                                    <ul>
                                                        <li>
                                                            <a 
                                                                href="/admin/module"
                                                                class="flex justify-between items-center gap-x-3 rounded-r-md px-4 py-2 text-sm text-gray-300 leading-6 font-semibold hover:text-gray-100"
                                                                x-bind:class="{'text-gray-100' : current_route_name == 'admin.module'}">
                                                                <span>Modules</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a 
                                                                href="/admin/roles-permission"
                                                                class="flex justify-between items-center gap-x-3 rounded-r-md px-4 py-2 text-sm text-gray-300 leading-6 font-semibold hover:text-gray-100"
                                                                x-bind:class="{'text-gray-100' : current_route_name == 'admin.roles-permission'}">
                                                                <span>Roles and Permission</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="fixed inset-y-0 z-50 flex w-64 flex-col" x-show="sidebar" style="display: none;">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div 
            class="flex grow flex-col gap-y-5 overflow-x-hidden overflow-y-auto bg-gray-900"
            x-show="sidebar"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="flex h-16 shrink-0 items-center mx-6">
                <x-application-logo class="h-6 w-6 fill-current text-gray-300" />
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li class="mx-6">
                                <!-- Current: "bg-gray-800 text-white", Default: "text-gray-300 hover:text-white hover:bg-gray-800" -->
                                <a 
                                    href="/admin/dashboard"
                                    class="flex items-center gap-x-3 rounded-md p-2 text-sm text-gray-300 leading-6 font-semibold hover:text-gray-100 hover:bg-gray-800"
                                    x-bind:class="{'bg-gray-800 text-gray-100' : current_route_name == 'admin.dashboard'}">
                                    <x-icon.home class="h-6 w-6 shrink-0" fill="currentColor" />
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="mx-6">
                                <a 
                                    href="/admin/user"
                                    class="flex items-center gap-x-3 rounded-md p-2 text-sm text-gray-300 leading-6 font-semibold hover:text-gray-100 hover:bg-gray-800"
                                    x-bind:class="{'bg-gray-800 text-gray-100' : current_route_name == 'admin.user'}">
                                    <x-icon.users-two class="h-6 w-6 shrink-0" stroke="currentColor" />
                                    <span>Users</span>
                                </a>
                            </li>
                            <li 
                                class="mx-6 space-y-1"
                                x-data="{ open: @entangle('menu.system'), toggleMenu() { this.open = !this.open } }">
                                <label 
                                    class="flex items-center justify-between gap-x-3 rounded-md p-2 text-sm text-gray-300 leading-6 font-semibold cursor-pointer hover:text-gray-100 hover:bg-gray-800"
                                    x-bind:class="{'bg-gray-800 text-gray-100' : open}"
                                    x-on:click="toggleMenu">
                                    <div class="flex items-center gap-3">
                                        <x-icon.settings class="h-6 w-6 shrink-0" stroke="currentColor" />
                                        <span>System</span>
                                    </div>
                                    <x-icon.caret-down class="h-4 w-4 shrink-0" fill="currentColor" />
                                </label>

                                <ul class="rounded-md overflow-hidden" x-show="open">
                                    <li>
                                        <a 
                                            href="/admin/module"
                                            class="flex items-center gap-x-3 bg-gray-800 p-2 text-sm text-gray-300 leading-6 font-semibold hover:text-gray-100"
                                            x-bind:class="{'text-gray-100' : current_route_name == 'admin.module'}">
                                            <x-icon.settings class="h-6 w-6 shrink-0 invisible" stroke="currentColor" />
                                            <span>Modules</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sidebar', () => ({
                current_route_name: @entangle('current_route_name'),
            }))
        })
    </script>
</div>
