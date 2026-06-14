@props(['name', 'label', 'col' => 'col-12', 'model' => null, 'value' => 1, 'checked' => false])

@php
    // Mengecek apakah checkbox harus tercentang secara otomatis
    $isChecked = old($name, $model ? $model->{$name} : $checked);
    $isInvalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<div class="{{ $col }} mb-3 d-flex align-items-end" style="min-height: 38px;">
    <div class="form-check pb-2">
        <input type="hidden" name="{{ $name }}" value="0">

        <input class="form-check-input {{ $isInvalid }}" type="checkbox" name="{{ $name }}"
            id="{{ $name }}" value="{{ $value }}" {{ $isChecked ? 'checked' : '' }} {{ $attributes }}>

        <label class="form-check-label fw-medium text-dark" for="{{ $name }}">
            {{ $label }}
        </label>

        @error($name)
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
