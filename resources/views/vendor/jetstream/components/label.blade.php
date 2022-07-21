@props(['value'])

<label {!! $attributes->merge(['class'=>'form-label fs-6 fw-bolder text-dark']) !!}>
    {{ $value ?? $slot }}
</label>
