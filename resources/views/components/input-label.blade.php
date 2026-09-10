@props(['value'])

<label {{ $attributes->merge(['class' => 'block aa-label']) }}>
    {{ $value ?? $slot }}
</label>
