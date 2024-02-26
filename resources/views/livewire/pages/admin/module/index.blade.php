<div x-data="data">
    <div class="flex flex-col items-baseline mb-2 justify-between">
        <x-label.title>Modules</x-label.title>
        <div class="flex items-center gap-2">
            <a href="/admin/dashboard" class="text-xs text-gray-500">Dashboard</a>
            <span class="text-xs text-gray-500">/</span>
            <span class="text-xs text-blue-400">Modules</span>
        </div>
    </div>

    <div class="space-y-3">
        <x-div.grid>
            <x-div.grid-col class="md:col-span-4">
                <x-div.flexbox class="relative">
                    <x-icon.search class="w-4 h-4 absolute left-3 text-gray-700" stroke="currentColor" />
                    <x-input.input class="pl-9" wire:model.live.debounce.250ms="filters.search" />
                </x-div.flexbox>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-input.select wire:model.live="filters.status">
                    <option value="" selected hidden>Status</option>
                    <option value="0">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </x-input.select>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-button.primary class="w-full" x-on:click="add_module_slider = true">Create</x-button.primary>
            </x-div.grid-col>
        </x-div.grid>

        <x-ui.card>
            <x-table.table>
                <thead>
                    <tr>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th width="100">Action</x-table.th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <x-table.td>No data available</x-table.td>
                    </tr>
                </tbody>
            </x-table.table>
        </x-ui.card>
    </div>

    <livewire:pages.admin.module.sliders.create slider="add_module_slider" />

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('data', () => ({
                add_module_slider: false,
            }))
        })
    </script>
</div>