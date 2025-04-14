<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block bg-afac-gray-low text-white py-2 px-4 rounded-lg hover:bg-slate-300']) }}>
    {{ $slot }}
</button>
