@props(['name' => '', 'description' => ''])
<div class="mt-1 sm:col-span-2 sm:mt-0">
    <textarea id="{{ $name }}" name="{{ $name }}" rows="3"
        {{ $attributes->merge(['class' => 'block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}></textarea>
    @if (!empty($description))
        <p class="mt-2 text-sm text-gray-500">{{ $description }}</p>
    @endif
</div>
