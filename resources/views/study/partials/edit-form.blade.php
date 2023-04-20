<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Study Information') }}
        </h2>
    </header>

    <form method="post" action="{{ route('studies.update', ['study' => $study->getKey()]) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ $study->title }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="logo" :value="__('Logo')" />
            <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
        </div>

        <div>
            <x-input-label for="start_year" :value="__('Start Year')" />
            <x-text-input id="start_year" name="start_year" type="number" class="mt-1 block w-full" value="{{ $study->start_year }}" required/>
            <x-input-error class="mt-2" :messages="$errors->get('start_year')" />
        </div>

        <div>
            <x-input-label for="end_year" :value="__('End Year')" />
            <x-text-input id="end_year" name="end_year" type="number" class="mt-1 block w-full" value="{{ $study->end_year }}" required/>
            <x-input-error class="mt-2" :messages="$errors->get('end_year')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-wysiwyg-input name="description">{{ $study->description }}</x-wysiwyg-input>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>


