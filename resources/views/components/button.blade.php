<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block bg-afac-blue text-white py-2 px-4 rounded-lg hover:bg-afac-golden']) }}>
    {{ $slot }}
</button>
