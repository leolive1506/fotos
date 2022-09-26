<div {{ $attributes->merge(['class' => 'relative z-40 lg:hidden']) }} role="dialog" aria-modal="true" x-show="openMobile" x-on:keydown.escape.window="openMobile = false">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

    <div class="fixed inset-0 flex z-40">
        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-cyan-700">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" x-on:click="openMobile = false">
                    <span class="sr-only">Close sidebar</span>
                    <x-icon name="x" class="z-50 h-10 w-10 text-white absolute top-2 right-0" />
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center justify-center px-4">
                <x-application-logo class="block w-auto fill-current text-white" />
            </div>
            <nav class="mt-5 flex-shrink-0 h-full divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                    <h2 class="text-2xl text-white font-bold">A mais gata</h2>
                </div>
                <div class="mt-6 pt-6">
                    <x-navigation.menu />
                </div>
            </nav>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>
