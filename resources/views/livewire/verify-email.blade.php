<x-authentication-card>
    <x-slot name="logo">
        <x-authentication-card-logo />
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Antes de continuar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no lo recibió, con gusto le enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="flex p-4 mb-4 mt-2 text-smounded-lg bg-green-50 text-green-900" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3">
                {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste en la configuración de tu perfil.') }}
            </div>
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <x-button type="submit">
                    {{ __('Reenviar correo electrónico de verificación') }}
                </x-button>
            </div>
        </form>

    </div>
</x-authentication-card>
