@props(['name', 'label', 'multiple' => false, 'placeholder' => 'Pilih opsi...', 'col' => 'col-12', 'model' => null])

@php
    $defaultClass = 'form-select select2-init ' . ($errors->has($name) ? 'is-invalid' : '');

    // Ambil data terpilih (bisa string untuk single, atau array untuk multiple)
    $selectedValue = old($name, $model ? $model->{$name} : '');

    // Ubah ke JSON agar aman dibaca oleh JavaScript di bawah
    $jsonSelectedValue = json_encode($selectedValue);
@endphp

<div class="{{ $col }} mb-3">
    <label for="{{ $name }}" class="form-label fw-medium">{{ $label }}</label>

    <select name="{{ $name }}{{ $multiple ? '[]' : '' }}" id="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }} {{ $attributes->merge(['class' => $defaultClass]) }}>

        @if (!$multiple)
            <option value=""></option>
        @endif

        {{ $slot }}
    </select>

    @error($name)
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>

@push('scripts')
    @once
        <script>
            $(document).ready(function() {
                $('.select2-init').each(function() {
                    let selectEl = $(this);

                    selectEl.select2({
                        theme: 'bootstrap-5',
                        width: '100%',
                        placeholder: selectEl.data('placeholder') || '{{ $placeholder }}',
                        allowClear: true
                    });

                    // TRIK OTOMATIS MEMILIH OPSI:
                    // Karena kita meletakkan script ini di dalam masing-masing komponen saat dipanggil,
                    // Kita akan mengecek spesifik ID dari elemen ini.
                    if (selectEl.attr('id') === '{{ $name }}') {
                        let valToSelect = {!! $jsonSelectedValue !!};
                        if (valToSelect !== "" && valToSelect !== null) {
                            selectEl.val(valToSelect).trigger('change');
                        }
                    }
                });
            });
        </script>
    @endonce
@endpush
