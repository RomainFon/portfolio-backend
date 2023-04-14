<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project') }}
            </h2>
            <a href="{{ route('projects.create') }}">
                <x-primary-button class="ml-3">
                    {{ __('Create Project') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($projects as $project)
                        <li>
                            <a href="/projects/{{ $project->getKey() }}" class="block hover:bg-gray-700">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="flex min-w-0 flex-1 items-center">
                                        <div class="flex-shrink-0 h-36 w-1/5 rounded-lg bg-center bg-cover" style="background-image: url('{{ asset('storage/' . $project->image) }}');"></div>
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $project->title }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $project->slug }}
                                                </p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                    <time datetime="2020-01-07">{{ $project->date->format('d/m/Y') }}</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</x-app-layout>
