<div class="relative z-5 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
    <button x-on:click="openMobile = true" type="button" class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-1 -->
        <x-icon name="menu-alt-1" class="h-6 w-6" />
    </button>
    <!-- Search bar -->
    <div class="flex-1 flex justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="ml-4 flex items-center">
            <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                <span class="sr-only">View notifications</span>
                <x-icon name="bell" class="h-6 w-6" />
            </button>

            <!-- Profile dropdown-->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <img src="{{ asset(auth()->user()->photo) }}" class="h-10 w-10 rounded-full object-cover ml-4"/>
                        </button>
                    </x-slot>
                    -
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        <x-dropdown-link :href="route('users.edit', auth()->user()->id)">
                            Editar perfil
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

            </div>
        </div>
    </div>
</div>
