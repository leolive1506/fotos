<div {{ $attributes->merge(['class' => 'hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0']) }}>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow bg-cyan-700 pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center justify-center flex-shrink-0 px-4">
            <x-application-logo class="block h-100 w-100 fill-current fill-white" />
        </div>
        <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
            <x-navigation.menu />

{{--            <div class="mt-6 pt-6">--}}
{{--                <div class="px-2 space-y-1">--}}
{{--                    <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">--}}
{{--                        <!-- Heroicon name: outline/cog -->--}}
{{--                        <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />--}}
{{--                        </svg>--}}
{{--                        Settings--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </nav>
    </div>
</div>
