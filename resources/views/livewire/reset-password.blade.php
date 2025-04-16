<div>
    <x-header>RECUPERAR CONTRASEÑA</x-header>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="block">
                <x-label for="email" value="{{ __('Correo Institucional') }}" />
                <x-input maxlength="35" id="email" class="block mt-1 w-full" :value="old('email', $email)" type="email"
                    name="email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password">Ingrese Contraseña Nueva</x-label>
                <x-input minlength="8" maxlength="15" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation">Confirmación de la Contraseña Nueva</x-label>
                <x-input minlength="8" maxlength="15" id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    GUARDAR
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</div>
