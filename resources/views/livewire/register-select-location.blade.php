<div>
    <x-label for="location" value="{{ __('Ubicacion*') }}" />
    <x-select id="location" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text" name="location" :value="old('location')" required autofocus autocomplete="location">
        @foreach ($ubicaciones as $ubicacion)
            <option value="{{ $ubicacion->piso }}">{{ $ubicacion->piso}}</option>
        @endforeach
    </x-select>
</div>