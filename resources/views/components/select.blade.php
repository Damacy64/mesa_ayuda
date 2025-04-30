{{-- <select {{ $attributes }} class="bg-afac-gray col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
    {{ $slot}}
</select> --}}

@props(['name', 'disabled' => false, 'required' => false])

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
