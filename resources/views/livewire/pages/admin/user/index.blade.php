<div>
    <div class="flex flex-col items-baseline mb-1 justify-between">
        <x-label.title>Users</x-label.title>
        <div class="flex items-center gap-2">
            <a wire:navigate href="/admin/dashboard" class="text-xs text-gray-500">Dashboard</a>
            <span class="text-xs text-gray-500">/</span>
            <span class="text-xs text-blue-400">Users</span>
        </div>
    </div>

    <div class="space-y-3">
        <x-div.grid>
            <x-div.grid-col class="md:col-span-4">
                <x-div.flexbox class="relative">
                    <x-icon.search class="w-4 h-4 absolute left-3 text-gray-700" stroke="currentColor" />
                    <x-input.input class="pl-9" />
                </x-div.flexbox>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-input.select>
                    <option value="" selected hidden>Role</option>
                </x-input.select>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-input.select>
                    <option value="" selected hidden>Status</option>
                </x-input.select>
            </x-div.grid-col>
            <x-div.grid-col class="md:col-span-2">
                <x-button.primary class="w-full">New</x-button.primary>
            </x-div.grid-col>
        </x-div.grid>

        <x-ui.card class="p-0">
            <x-table.table>
                <thead>
                    <tr>
                        <x-table.th>Name</x-table.th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <x-table.td>Juan Dela Cruz</x-table.td>
                    </tr>
                </tbody>
            </x-table.table>
        </x-ui.card>
    </div>
</div>