@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-lime-900']) }}>
    {{ $value ?? $slot }}
</label>
