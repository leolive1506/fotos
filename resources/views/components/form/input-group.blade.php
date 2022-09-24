@props(['name', 'label', 'placeholder' => '', 'input' => ''])
<div {{ $attributes->merge(['class' => 'sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5']) }}>
    <x-label :for="$name" :value="$label" />
    @if ($input)
        {{ $input }}
    @else
        <x-input :name="$name" :id="$name" :placeholder="$placeholder" />
    @endif

</div>
