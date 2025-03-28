<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-afac-gray-low text-white w-full py-2 rounded-lg mt-6 hover:bg-slate-300']) }}>
    {{ $slot }}
</button>
