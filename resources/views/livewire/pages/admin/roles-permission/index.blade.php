<div x-data="data">
    <div class="flex flex-col items-baseline mb-2 justify-between">
        <x-label.title>Roles and Permission</x-label.title>
        <div class="flex items-center gap-2">
            <a href="/admin/dashboard" class="text-xs text-gray-500">Dashboard</a>
            <span class="text-xs text-gray-500">/</span>
            <span class="text-xs text-blue-400">Roles and Permission</span>
        </div>
    </div>

    <div class="space-y-3">
        <x-div.grid>
            <x-div.grid-col class="md:col-span-4">
                <div class="relative" x-data="{ dropdown: false, toggleDropdown() { this.dropdown = !this.dropdown } }">
                    <div class="w-full border border-gray-300 rounded-md shadow-sm text-xs bg-gray-100 text-gray-700">
                        <div class="flex items-center justify-between px-3 py-1.5">
                            <span>{{ $current_role['display_name'] }}</span>
                            <x-icon.caret-down class="w-4 h-4 cursor-pointer" stroke="#FFF" wire:target="role" wire:loading.remove x-on:click="toggleDropdown"/>
                            <x-icon.loading class="w-4 h-4" wire:target="role" wire:loading />
                        </div>
                    </div>
                    <div class="absolute w-full bg-white text-xs rounded-md shadow-md cursor-pointer mt-3 z-10" style="display: none;" x-show="dropdown">
                        <ul class="space-y-0.5">
                            @foreach ($roles as $role)
                            <li class="rounded-md px-3 py-1.5 hover:bg-gray-100" wire:key="{{ $role->id }}" wire:click="role('{{ $role->id }}')" x-on:click="toggleDropdown">
                                <div class="flex items-center justify-between">
                                    <span>{{ $role->display_name }}</span>

                                    @if ($current_role && $current_role['id'] === $role->id)
                                    <x-icon.check class="w-4 h-4" stroke="#000" />
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-button.primary class="w-full" x-on:click="add_role_slider = true">Create</x-button.primary>
            </x-div.grid-col>
        </x-div.grid>

        <x-ui.card class="p-3">
            <div class="space-y-3">
                @foreach ($modules as $module)
                <div wire:key="{{ $module->id }}" x-data="{ dropdown: false, toggleDropdown() { this.dropdown = ! this.dropdown } }">
                    <div class="border rounded-md px-3">
                        <div class="flex items-center justify-between py-2">
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" class="rounded border-gray-300 text-bg-darkblue shadow-sm">
                                <span class="text-xs">{{ $module->display_name }}</span>
                            </label>
                            <x-icon.caret-down class="w-4 h-4 cursor-pointer" stroke="#757575" x-on:click="toggleDropdown" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>
</div>