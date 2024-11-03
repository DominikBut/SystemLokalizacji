<x-action-section>
    <x-slot name="title">
        {{ __('Usuń konto') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Usuwa twoje konto na stałe.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled" class="px-4 py-2 text-sm font-semibold text-white inline-flex items-center  ring-2 ring-red-400 rounded-2xl px-1 hover:ring-4 hover:font-semibold transition ease-in-out duration-300">
                {{ __('Usuń konto') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Usuń konto') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Czy na pewno chcesz usunąć swoje konto? Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte. Wprowadź hasło, aby potwierdzić, że chcesz trwale usunąć swoje konto.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Hasło') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Anuluj') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Usuń konto') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
