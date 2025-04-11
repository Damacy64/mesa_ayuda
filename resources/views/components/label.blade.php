@props(['value'])

<label {{ $attributes->merge(['class' => 'text-xs sm:text-sm md:text-base lg:text-lg block text-gray-700 font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
