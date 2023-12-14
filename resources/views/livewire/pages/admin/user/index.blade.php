<div>
    <div class="flex items-center justify-between py-1.5 mb-1">
        <x-input-label class="text-xl font-semibold">Users</x-input-label>
        <div class="flex items-center gap-2">
            <a wire:navigate href="/admin/dashboard" class="text-sm text-gray-400">Dashboard</a>
            <span class="text-sm text-gray-400">/</span>
            <span class="text-sm text-blue-400">Users</span>
        </div>
    </div>

    <x-ui.card>
        <x-division.flexbox>
            <x-division.flexbox>
                <x-icon.search class="w-4 h-4" />
                <x-text-input />
            </x-division.flexbox>
            
            <x-primary-button>
                <span>Search</span>
            </x-primary-button>
        </x-division.flexbox>
    </x-ui.card>
</div>
