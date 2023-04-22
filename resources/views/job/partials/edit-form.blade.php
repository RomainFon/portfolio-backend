<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Job Information') }}
        </h2>
    </header>

    <form method="post" action="{{ route('jobs.update', ['job' => $job->getKey()]) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ $job->title }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="logo" :value="__('Logo')" />
            <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
        </div>

        <div>
            <x-input-label for="company" :value="__('Company')" />
            <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" value="{{ $job->company }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('company')" />
        </div>

        <div>
            <x-input-label for="type" :value="__('Type')" />
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" value="{{ $job->type }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" value="{{ $job->city }}" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" value="{{ $job->start_date }}" required/>
            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
        </div>

        <div>
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" value="{{ $job->end_date }}" required/>
            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-wysiwyg-input name="description">{{ $job->description }}</x-wysiwyg-input>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>


