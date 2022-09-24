@props(['disabled' => false, 'prepend' => '', 'name' => '', 'type' => 'text'])

@if (empty($prepend))
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" autocomplete="{{ $name }}"
    {{ $attributes->merge(['class' => 'block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm']) }}>
@else
    <div class="mt-1 sm:col-span-2 sm:mt-0">
        <div class="flex max-w-lg rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">{{ $prepend }}</span>
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" autocomplete="{{ $name }}"
                {{ $attributes->merge(['class' => 'block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
            >
        </div>
    </div>
@endif
