@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-700 font-bold']) }}>
    {{ $value ?? $slot }}
</label>
