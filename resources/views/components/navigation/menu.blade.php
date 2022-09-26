@props(['classIcon' => 'mr-4 flex-shrink-0 h-6 w-6 text-cyan-200'])
<div {{ $attributes->merge(['class' => 'px-2 space-y-1']) }}>
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <x-slot:icon>
            <x-icon name="home" :class="$classIcon" />
        </x-slot:icon>
        Dashboard
    </x-nav-link>
</div>
