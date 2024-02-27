<div>
    <x-slider.slider name="{{ $slider }}">
        <x-slot name="title">Edit Module</x-slot>
        <x-slot name="content">
            @isset($module)
            <div class="space-y-3 py-3">
                <div class="space-y-0.5">
                    <x-label.label>Name</x-label.label>
                    <x-label.input>{{ $module['display_name'] }}</x-label.input>
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Description</x-label.label>
                    <x-input.input wire:model="module.description" />

                    @error('module.description')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Status</x-label.label>
                    <x-input.select wire:model="module.status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-input.select>
                    
                    @error('module.module')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Permissions</x-label.label>

                    @foreach ($permissions as $permission_key => $permission)
                    <div class="space-y-3" wire:key="edit-permission-{{ $permission_key }}">
                        <div class="border rounded-md overflow-hidden divide-y">
                            <div class="flex items-center">
                                <select class="w-full text-xs border-none focus:ring-0" wire:model.live="permissions.{{ $permission_key }}.category">
                                    <option value="" selected hidden>Select</option>

                                    @foreach ($categories as $key => $category)
                                        @if (data_get($permissions, $permission_key.'.category') == $key || in_array($key, data_get($permissions, '*.category')) == false)
                                        <option value="{{ $key }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($loop->first == false)
                                <button class="flex items-center px-3" wire:click="removePermission({{ $permission_key }})">
                                    <x-icon.loading class="w-2.5 h-2.5" fill="currentColor" wire:target="removePermission({{ $permission_key }})" wire:loading />
                                    <x-icon.close class="w-2.5 h-2.5" fill="currentColor" wire:target="removePermission({{ $permission_key }})" wire:loading.remove />
                                </button>
                                @endif
                            </div>
        
                            @if ($permission['items'])
                            <div class="space-y-1 px-3 py-2">
                                @foreach ($permission['items'] as $item_key => $item)
                                <div class="space-y-2" wire:key="edit-item-{{ $item_key }}">
                                    <div class="flex gap-1">
                                        <x-input.input placeholder="Name" wire:model="permissions.{{ $permission_key }}.items.{{ $item_key }}.name" />

                                        @if ($loop->first == false)
                                        <button class="flex items-center px-2.5 bg-gray-900 text-gray-100 rounded-md" wire:click="removeItem({{ $permission_key }}, {{ $item_key }})">
                                            <x-icon.loading class="w-2.5 h-2.5" fill="currentColor" wire:target="removeItem({{ $permission_key }}, {{ $item_key }})" wire:loading />
                                            <x-icon.close class="w-2.5 h-2.5" fill="currentColor" wire:target="removeItem({{ $permission_key }}, {{ $item_key }})" wire:loading.remove />
                                        </button>
                                        @endif
                                    </div>

                                    @if ($loop->last)
                                    <button 
                                        type="button" 
                                        class="w-full px-3 py-1.5 border border-dashed border-gray-900 rounded-md text-gray-900 text-xs tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        wire:click="addItem({{ $permission_key }})" 
                                        wire:target="addItem({{ $permission_key }})" 
                                        wire:loading.class="pointer-events-none">
                                        <div class="flex items-center justify-center gap-2">
                                            <x-icon.loading class="w-3.5 h-3.5" fill="currentColor" wire:target="addItem({{ $permission_key }})" wire:loading />
                                            <span>Add item</span>
                                        </div>
                                    </button>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        @if ($loop->last && count($permissions) < 4)
                        <button 
                            type="button" 
                            class="w-full px-3 py-1.5 border border-dashed border-gray-900 rounded-md text-gray-900 text-xs tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            wire:click="addPermission" 
                            wire:target="addPermission" 
                            wire:loading.class="pointer-events-none">
                            <div class="flex items-center justify-center gap-2">
                                <x-icon.loading class="w-3.5 h-3.5" fill="currentColor" wire:target="addPermission" wire:loading />
                                <span>Add permission</span>
                            </div>
                        </button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endisset
        </x-slot>
        <x-slot name="action">
            <x-button.secondary x-on:click="{{ $slider }} = false">Cancel</x-button.primary>
            <x-button.primary wire:click="update" target="update">Save Changes</x-button.primary>
        </x-slot>
    </x-slider.slider>
</div>