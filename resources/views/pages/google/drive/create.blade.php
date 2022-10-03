<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Salvar no drive
        </h2>
    </x-slot>

    <x-utils.container>
        <form class="w-full" method="POST" action="{{ route('drive.store') }}" enctype="multipart/form-data">
            <div class="request">
                <a href='{{ $authUrl }}'>Connect Me!</a>
              </div>
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 w-full">
                <div>
                    <x-form.container>
                        <x-form.input-group name="name" label="Nome""/>
                        <x-form.input-group name="photo" label="Cover photo">
                            <x-slot:input>
                                <x-form.input-upload name="photo">
                                    <x-slot:icon>
                                        <div class="flex items-center justify-center">
                                            <span class="h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                                <img id="user-photo" src="{{ asset(auth()->user()->photo) }}" />
                                            </span>
                                        </div>
                                    </x-slot:icon>
                                </x-form.input-upload>
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
    </x-utils.container>
    <script>
        const inputPhoto = document.querySelector("input#photo")
        inputPhoto.onchange = event => {
            const [file] = inputPhoto.files
            if (file) {
                const output = document.getElementById('user-photo');
                output.src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>

