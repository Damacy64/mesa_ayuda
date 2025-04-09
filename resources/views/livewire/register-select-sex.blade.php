<div>
    <x-label for="sex" value="{{ __('Sexo*') }}" />
    <x-select id="sex" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text" name="sex" :value="old('sex')" required autofocus autocomplete="sex">
        @foreach ($generos as $genero)
            <option value="{{ $genero->sexo }}"> {{ $genero->sexo }}</option>
        @endforeach
    </x-select>
</div>
