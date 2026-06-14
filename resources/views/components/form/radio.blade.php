@props(['name', 'label', 'options' => [], 'col' => 'col-12', 'model' => null, 'value' => ''])

@php
    $selectedValue = old($name, $model ? $model->{$name} : $value);
@endphp

<div class="{{ $col }} mb-3">
    <label class="form-label d-block fw-medium">{{ $label }}</label>

    <div class="d-flex gap-3 flex-wrap pt-1">
        @foreach ($options as $actualValue => $displayLabel)
            @php
                $optionId = $name . '_' . $actualValue;
                $isInvalid = $errors->has($name) ? 'is-invalid' : '';
            @endphp

            <div class="form-check">
                <input class="form-check-input {{ $isInvalid }}" type="radio" name="{{ $name }}"
                    id="{{ $optionId }}" value="{{ $actualValue }}"
                    {{ $selectedValue == $actualValue ? 'checked' : '' }} {{ $attributes }}>

                <label class="form-check-label text-dark" for="{{ $optionId }}">
                    {{ $displayLabel }}
                </label>
            </div>
        @endforeach
    </div>

    @error($name)
        <div class="text-danger small mt-1 d-block">
            {{ $message }}
        </div>
    @enderror
</div>
