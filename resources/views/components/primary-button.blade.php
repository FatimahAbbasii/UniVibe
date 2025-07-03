<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-black text-white text-sm px-6 py-3 rounded-md border border-white shadow-md hover:bg-gray-800 transition']) }}>
    {{ $slot }}
</button>
