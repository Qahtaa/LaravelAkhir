<button {{ $attributes->merge(['type' => 'submit', 'class' => 'aa-button-danger']) }}>
    {{ $slot }}
</button>
