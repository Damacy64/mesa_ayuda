@props(['name' => null, 'disabled' => false, 'required' => false])

@php
    $hasError = $errors->has($name);
@endphp

<div>
    <select name="{{ $name }}" id="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }} {!! $attributes->merge([
            'class' =>
                'bg-afac-gray p-2 border rounded-lg mt-1 w-full ' .
                ($hasError ? 'border-red-500 text-red-600' : 'border-gray-300'),
        ]) !!}>
        {{ $slot }}
    </select>
</div>
