<div>
    <x-slider.slider name="{{ $slider }}">
        <x-slot name="title">Edit User</x-slot>
        <x-slot name="content">
            @isset($user)
            <div class="space-y-3 py-3">
                <div class="space-y-0.5">
                    <x-label.label>First Name</x-label.label>
                    <x-input.input wire:model="user.given_name" />

                    @error('user.given_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Middle Name</x-label.label>
                    <x-input.input wire:model="user.middle_name" />
                    
                    @error('user.middle_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Last Name</x-label.label>
                    <x-input.input wire:model="user.family_name" />
                    
                    @error('user.family_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Email Address</x-label.label>
                    <x-input.input type="email" wire:model="user.email" />
                    
                    @error('user.email')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-0.5">
                    <x-label.label>Status</x-label.label>
                    <x-input.select wire:model="user.status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-input.select>
                    
                    @error('user.user')
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