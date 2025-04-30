{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-afac-gray p-2 border rounded-lg mt-1']) !!}> --}}
{{-- filepath: c:\xampp\htdocs\mesa_ayuda\resources\views\components\input.blade.php --}}
@props(['name', 'disabled' => false, 'required' => false])

@php
    $hasError = $errors->has($name);
@endphp

<div>
    <input name="{{ $name }}" id="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }} value="{{ old($name) }}" {!! $attributes->merge([
            'class' =>
                'bg-afac-gray p-2 border rounded-lg mt-1 w-full ' .
                ($hasError ? 'border-red-500 text-red-600' : 'border-gray-300'),
        ]) !!}>
</div>
