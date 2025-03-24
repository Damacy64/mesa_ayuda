<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-afac-blue text-white w-full py-2 rounded-lg mt-6 hover:bg-blue-800']) }}>
    {{ $slot }}
</button>
