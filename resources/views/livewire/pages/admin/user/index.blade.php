<div x-data="data">
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
                <x-button.primary class="w-full" x-on:click="add_user_slider = true">New</x-button.primary>
            </x-div.grid-col>
        </x-div.grid>

        <x-ui.card>
            <x-table.table>
                <thead>
                    <tr>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Email</x-table.th>
                        <x-table.th>Created Date</x-table.th>
                        <x-table.th>Last Updated</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Action</x-table.th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $user)
                    <tr class="hover:bg-gray-50">
                        <x-table.td class="font-medium text-gray-900">{{ $user->fullName() }}</x-table.td>
                        <x-table.td>{{ $user->email }}</x-table.td>
                        <x-table.td>{{ $user->created_at }}</x-table.td>
                        <x-table.td>{{ $user->updated_at }}</x-table.td>
                        <x-table.td>
                            <span @class(['capitalize text-xs text-gray-100 rounded-full px-2 py-0.5', 'bg-green-700' => $user->status() == 'active', 'bg-red-700' => $user->status() == 'inactive'])>
                                {{ $user->status() }}
                            </span>
                        </x-table.td>
                        <x-table.td>
                            <div class="flex gap-2">
                                <span class="cursor-pointer text-blue-700 hover:text-blue-900" wire:click="edit('{{ $user->uuid }}')">Edit</span>
                                <span class="cursor-pointer text-red-700 hover:text-red-900" wire:click="delete('{{ $user->uuid }}')">Delete</span>
                            </div>
                        </x-table.td>
                    </tr>
                    @empty
                    <tr>
                        <x-table.td>No data available</x-table.td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table.table>

            @if ($data->hasPages())
            <div class="p-3">
                {{ $data->links() }}
            </div>
            @endif
        </x-ui.card>
    </div>
    
    @livewire('pages.admin.user.sliders.create', ['slider' => 'add_user_slider'])
    @livewire('pages.admin.user.sliders.edit', ['slider' => 'edit_user_slider'])
    @livewire('pages.admin.user.modals.delete', ['modal' => 'delete_user_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('data', () => ({
                add_user_slider: false,
                edit_user_slider: @entangle('components.edit_user_slider').live,
                delete_user_modal: @entangle('components.delete_user_modal').live,
            }))
        })
    </script>
</div>