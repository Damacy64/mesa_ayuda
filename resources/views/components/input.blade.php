@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-afac-gray p-2 border rounded-lg mt-1']) !!}>
