@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-red-500 text-start text-base font-medium text-white bg-red-950/40 focus:outline-none focus:text-white focus:bg-red-950/60 focus:border-red-400 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 hover:border-zinc-600 focus:outline-none focus:text-white focus:bg-zinc-800 focus:border-zinc-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
