<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn log inline-flex items-center px-4 py-2 text-xs text-white uppercase tracking-widest disabled:opacity-25']) }}>
    {{ $slot }}
</button>
