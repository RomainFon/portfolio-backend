<x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-study-deletion')">
    {{ __('Delete Study') }}
</x-danger-button>

<x-modal name="confirm-study-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('studies.destroy', ['study' => $study->getKey()]) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete your study ?') }}
        </h2>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete Study') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
