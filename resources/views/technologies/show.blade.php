<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Technology') }}
            </h2>
            <div>
                <a href="{{ route('technologies.edit', ['technology' => $technology->getKey()]) }}">
                    <x-primary-button class="ml-3">
                        {{ __('Edit Technology') }}
                    </x-primary-button>
                </a>
                @include('technologies.partials.delete-form')
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-6 sm:px-6">
                    <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">{{ $technology->name }}</h3>
                </div>
                <div class="border-t border-gray-700">
                    <dl class="divide-y divide-gray-700">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Top</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                @if ($technology->top)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900 dark:text-gray-100">Icon</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                <img src="{{ asset('storage/' . $technology->icon) }}" class="w-12 h-12"/>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
