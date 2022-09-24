<div>

    @if (session()->has('success'))
        <x-notify.success />
        <span x-init="$dispatch('success', {{ json_encode(session()->get('success')) }})"></span>
    @endif

    @if (session()->has('error'))
        <x-notify.error />
        <span x-init="$dispatch('error', {{ json_encode(session()->get('error')) }})"></span>
    @endif

</div>
