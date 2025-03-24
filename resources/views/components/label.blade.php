@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-700 font-medium']) }}>
    {{ $value ?? $slot }}
</label>
