<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Technology Information') }}
        </h2>
    </header>

    <form method="post" action="{{ route('technologies.update', ['technology' => $technology->getKey()]) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $technology->name }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="top" :value="__('Top')" />
            <x-text-input id="top" name="top" type="checkbox" class="mt-1 block w-6 h-6" value="{{ $technology->top }}" />
            <x-input-error class="mt-2" :messages="$errors->get('top')" />
        </div>

        <div>
            <x-input-label for="icon" :value="__('Icon')" />
            <x-text-input id="icon" name="icon" type="file" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>


