@props(['name', 'disabled' => false, 'required' => false, 'rows' => 4])

@php
    $hasError = $errors->has($name);
@endphp

<div>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }} {!! $attributes->merge([
            'class' =>
                'bg-afac-gray p-2 border rounded-lg mt-1 w-full ' .
                ($hasError ? 'border-red-500 text-red-600' : 'border-gray-300'),
        ]) !!}></textarea>

</div>
