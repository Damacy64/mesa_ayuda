@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-afac-gray w-full p-2 border rounded-lg mt-1']) !!}>
