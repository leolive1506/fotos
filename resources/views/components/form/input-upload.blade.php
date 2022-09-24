@props(['title' => 'Selecione um arquivo', 'name'])
<div {{ $attributes->merge(['class' => 'mt-1 sm:col-span-2 sm:mt-0']) }}>
    <div
        class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
        <div class="space-y-1 text-center">
            <x-icon name="cloud-arrow-up" class="mx-auto h-12 w-12 text-gray-400" />
            <div class="flex text-sm text-gray-600">
                <label :for="$name"
                       class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span class="p-2">{{ $title }}</span>
                    <x-input :id="$name" :name="$name" type="file" class="sr-only" />
                </label>
            </div>
        </div>
    </div>
</div>
