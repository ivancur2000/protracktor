<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-lg mb-5']) }}>
    {{ $slot }}
</button>
