<div>
    <x-slider.slider name="{{ $slider }}">
        <x-slot name="title">Edit Module</x-slot>
        <x-slot name="content">
            @isset($module)
            <div class="space-y-3 py-3">
                <div class="space-y-0.5">
                    <x-label.label>Name</x-label.label>
                    <x-input.input wire:model="module.display_name" />

                    @error('module.display_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Description</x-label.label>
                    <x-input.textarea wire:model="module.description"></x-input.textarea>

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
            </div>
            @endisset
        </x-slot>
        <x-slot name="action">
            <x-button.secondary x-on:click="{{ $slider }} = false">Cancel</x-button.primary>
            <x-button.primary wire:click="update" target="update">Save Changes</x-button.primary>
        </x-slot>
    </x-slider.slider>
</div>