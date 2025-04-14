<div>
    <x-label for="dispositivo" value="{{ __('Equipo*') }}" />
    <x-select id="dispositivo" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text" name="dispositivo" :value="old('dispositivo')" required autofocus autocomplete="dispositivo">
        @foreach ($generos as $genero)
            <option value="{{ $genero->sexo }}"> {{ $genero->sexo }}</option>
        @endforeach
    </x-select>
</div>
