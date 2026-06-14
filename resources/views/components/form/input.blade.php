@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'col' => 'col-12',
    'model' => null, // Menerima lemparan data model dari Controller
])

@php
    $defaultClass = 'form-control ' . ($errors->has($name) ? 'is-invalid' : '');

    // Logika Pintar:
    // 1. Cek 'old($name)' jika user gagal validasi
    // 2. Jika tidak ada, cek apakah ada $model, lalu ambil data dari kolom database ($model->{$name})
    // 3. Jika tidak ada juga (form create baru), gunakan $value default
    $inputValue = old($name, $model ? $model->{$name} : $value);
@endphp

<div class="{{ $col }} mb-3">
    <label for="{{ $name }}" class="form-label fw-medium">{{ $label }}</label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $inputValue }}"
        {{ $attributes->merge(['class' => $defaultClass]) }}>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
