<select id="{{ $attributes['id'] . '-select' }}"
    {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
        <option disabled selected>{{ __('Choose Value') }}</option>
        @foreach($ressources as $resource)
            <option value="{{ $resource->value }}">{{ $resource->text }}</option>
        @endforeach
</select>

<ul id="{{ $attributes['id'] . '-data' }}" class="flex mt-4">
</ul>

@push('scripts')
    <script>
        const resourceName = '{{ $attributes['id'] }}'
        document.querySelector('#' + resourceName + '-select').addEventListener('change', function() {

            if (document.querySelector('input[name="' + resourceName + '[]"][value="' + this.value + '"]') === null) {
                const element = document.createElement('li')
                element.addEventListener('click', function () {
                    this.remove()
                })

                const input = document.createElement('input')
                input.value = this.value
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', resourceName + '[]')

                const resource = document.createElement('span')
                resource.classList.add('inline-flex', 'items-center', 'rounded-full', 'bg-blue-100', 'px-3', 'py-0.5', 'text-sm', 'font-medium', 'text-blue-800', 'mr-2', 'cursor-pointer')
                resource.innerText = this.options[this.selectedIndex].text

                element.append(input, resource)
                document.querySelector('#' + resourceName + '-data').append(element)
            }
        })
    </script>
@endpush

