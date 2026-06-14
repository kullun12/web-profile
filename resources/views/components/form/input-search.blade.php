@props([
    'name',
    'label',
    'value' => '',
    'placeholder' => 'Pilih data...',
    'col' => 'col-12',
    'modalTarget' => 'searchModal',
    'model' => null,
])

@php
    $defaultClass = 'form-control ' . ($errors->has($name) ? 'is-invalid' : '');
    $inputValue = old($name, $model ? $model->{$name} : $value);
@endphp

<div class="{{ $col }} mb-3">
    <label for="{{ $name }}" class="form-label fw-medium">{{ $label }}</label>

    <div class="input-group">
        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $inputValue }}"
            placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => $defaultClass]) }}>

        <button class="btn btn-primary px-3" type="button" data-bs-toggle="modal" data-bs-target="#{{ $modalTarget }}"
            title="Cari Data">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <button class="btn btn-danger px-3" type="button"
            onclick="document.getElementById('{{ $name }}').value = ''" title="Bersihkan Input">
            <i class="fas fa-trash"></i>
        </button>
    </div>

    @error($name)
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>
