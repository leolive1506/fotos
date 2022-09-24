@props(['href' => '#', 'title' => 'Salvar', 'color' => 'focus:ring-indigo-500 bg-indigo-600 hover:bg-indigo-700', 'textColor' => 'text-white'])

<a href="{{ $href }}"
        class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium {{ $textColor }} shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $color }}">
    Salvar
</a>
