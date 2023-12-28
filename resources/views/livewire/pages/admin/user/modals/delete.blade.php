<div>
    <x-modal.modal name="{{ $modal }}">
        <x-slot name="content">
            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate
                    account</h3>
                @isset($user)
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to deactivate <span class="font-semibold">{{ $user->fullName() }}</span> account? All of its data will be permanently removed.</p>
                </div>
                @endisset
            </div>
        </x-slot>
        <x-slot name="action">
            <x-button.secondary x-on:click="{{ $modal }} = false">Cancel</x-button.primary>
            <x-button.danger wire:click="delete">Deactivate</x-button.danger>
       </x-slot>
    </x-modal.modal>
</div>
