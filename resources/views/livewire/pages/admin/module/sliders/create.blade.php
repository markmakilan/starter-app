<div>
    <x-slider.slider name="{{ $slider }}">
        <x-slot name="title">New Module</x-slot>
        <x-slot name="content">
            <div class="space-y-3 py-3">
                <div class="space-y-0.5">
                    <x-label.label>Name</x-label.label>
                    <x-input.input wire:model="module.display_name" />

                    @error('module.display_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>
        <x-slot name="action">
            <x-button.secondary x-on:click="{{ $slider }} = false">Cancel</x-button.primary>
            <x-button.primary wire:click="save" target="save">Save</x-button.primary>
        </x-slot>
    </x-slider.slider>
</div>