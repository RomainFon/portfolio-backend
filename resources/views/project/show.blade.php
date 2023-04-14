<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project') }}
            </h2>
            <div>
                <a href="{{ route('projects.create') }}">
                    <x-primary-button class="ml-3">
                        {{ __('Edit Project') }}
                    </x-primary-button>
                </a>
                @include('project.partials.delete-form')
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-6 sm:px-6">
                    <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">{{ $project->title }}</h3>
                </div>
                <div class="border-t border-gray-700">
                    <dl class="divide-y divide-gray-700">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Slug</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">{{ $project->slug }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Date</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">{{ $project->date->format('d/m/Y') }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Lien</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">{{ $project->link }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Image</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                <div class="flex-shrink-0 h-96 w-auto rounded-lg bg-center bg-cover" style="background-image: url('{{ asset('storage/' . $project->image) }}');"></div>
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Description</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">{!! $project->description !!}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
