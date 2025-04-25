@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-g text-sm font-semibold text-afac-golden leading-5 focus:outline-none focus:border-afac-golden transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-semibold leading-5 text-afac-golden hover:text-afac-golden hover:border-afac-golden focus:outline-none focus:text-afac-gold focus:border-afac-golden transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    {{ __('INICIO') }}
</a>
<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route('dispositivos') }}" :active="request()->routeIs('dispositivos')">
    {{ __('DISPOSITIVOS') }}
</a>
<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
    {{ __('USUARIOS') }}
</a>
<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route('tecnicos') }}" :active="request()->routeIs('tecnicos')">
    {{ __('TECNICOS') }}
</a>
<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route('areas') }}" :active="request()->routeIs('areas')">
    {{ __('ÁREAS') }}
</a>
     