@props(['name', 'label', 'placeholder' => '', 'input' => '', 'value' => ''])
<div {{ $attributes->merge(['class' => 'sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5']) }}>
    <x-label :for="$name" :value="$label" />
    <div class="flex flex-col gap-2">
        @if ($input)
            {{ $input }}
        @else
            <div class="relative mt-1 rounded-md shadow-sm w-full">
                <x-input :name="$name" :id="$name" :placeholder="$placeholder" :value="$value" />
                @error($name)
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                    <x-icon name="exclamation-circle" class="h-5 w-5 text-red-500" />
                </div>
                @enderror
            </div>
        @endif
        @error($name)
            <div class="flex justify-start items-center">
                <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
            </div>
        @enderror
    </div>
</div>
