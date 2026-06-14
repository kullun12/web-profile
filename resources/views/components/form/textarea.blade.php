@props(['name', 'label', 'value' => '', 'rows' => 3, 'col' => 'col-12', 'model' => null])

@php
    $defaultClass = 'form-control ' . ($errors->has($name) ? 'is-invalid' : '');
    $inputValue = old($name, $model ? $model->{$name} : $value);
@endphp

<div class="{{ $col }} mb-3">
    <label for="{{ $name }}" class="form-label fw-medium">{{ $label }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
        {{ $attributes->merge(['class' => $defaultClass]) }}>{{ $inputValue }}</textarea>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
