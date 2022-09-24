<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar usuário
        </h2>
    </x-slot>

    <div class="py-12">
{{--        {{dd($user)}}--}}
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

            <form class="space-y-8 divide-y divide-gray-200 w-full" method="POST" action="{{ route('users.update', ['user' => auth()->user()->id]) }}">
                @method('PUT')
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 w-full">
                    <div>
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Perfil</h3>
                        </div>

                        <x-form.container>
                            <x-form.input-group name="name" label="Nome" />
                            <x-form.input-group name="email" label="Email" />
                            <x-form.input-group name="photo" label="Foto">
                                <x-slot:input>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex items-center">
                                        <span class="h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                            <x-icon style="other" name="profile" />
                                        </span>
                                        </div>
                                    </div>
                                </x-slot:input>
                            </x-form.input-group>
                            <x-form.input-group name="cover-photo" label="Cover photo">
                                <x-slot:input>
                                    <x-form.input-upload name="photo"/>
                                </x-slot:input>
                            </x-form.input-group>

                        </x-form.container>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end gap-2">
                        <x-buttons.clean-link :href="route('dashboard')" />

                        <x-buttons.default />
                    </div>
                </div>
            </form>
            <div>
                <h1>ERRORS</h1>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>

