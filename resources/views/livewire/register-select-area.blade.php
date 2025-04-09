<div>
    <x-label for="area" value="{{ __('Area*') }}" />
    <x-select id="area" class="block mt-1 w-full bg-afac-gray border rounded-lg" type="text" name="area" :value="old('area')" required autofocus autocomplete="area">
        @foreach ($areas as $area)
            <option value="{{ $area->departamento }}">{{ $area->departamento}}</option>
        @endforeach
    </x-select>
</div>