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
            <x-div.grid-col class="md:col-span-2">
                <x-button.primary class="w-full" x-on:click="add_module_slider = true">Create</x-button.primary>
            </x-div.grid-col>
        </x-div.grid>
    </div>
</div>