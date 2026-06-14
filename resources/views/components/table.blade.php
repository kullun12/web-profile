@props([
    'columns' => [], // Array konfigurasi kolom: ['kolom_db' => 'Label Kolom']
    'collection' => null, // Data dari Eloquent (Paginator atau Collection)
    'modelName' => 'Data', // Nama modul untuk pesan kosong (misal: "Pelamar")
    'actionView' => '', // Path view opsional untuk menyisipkan tombol aksi kustom (Edit/Delete)
])

<div class="table-responsive bg-white rounded-4 shadow-sm border border-light-subtle">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th width="5%" class="text-center py-3 rounded-top-start-4">No.</th>

                @foreach ($columns as $field => $label)
                    <th class="py-3">{{ $label }}</th>
                @endforeach

                @if ($actionView)
                    <th width="15%" class="text-center py-3 rounded-top-end-4">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($collection as $index => $row)
                <tr>
                    {{-- Penomoran dinamis (mendukung pagination jika ada) --}}
                    <td class="text-center text-secondary">
                        {{ method_exists($collection, 'firstItem') ? $collection->firstItem() + $index : $index + 1 }}
                    </td>

                    {{-- Looping data sesuai urutan kolom yang didefinisikan --}}
                    @foreach ($columns as $field => $label)
                        <td>
                            @php
                                // Memanggil nilai dari model berdasarkan nama field
                                $value = $row->{$field};

                                // Format khusus jika value adalah boolean (seperti is_verified)
                                if (is_bool($value)) {
                                    $html = $value
                                        ? '<span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-check-circle me-1"></i>Ya</span>'
                                        : '<span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1"><i class="bi bi-dash-circle me-1"></i>Tidak</span>';
                                    echo $html;
                                }
                                // Format khusus jika value adalah array (seperti kualifikasi JSON)
                                elseif (is_array($value)) {
                                    echo '<span class="text-muted small">' . implode(', ', $value) . '</span>';
                                }
                                // Teks biasa
                                else {
                                    echo '<span class="text-dark fw-medium">' . ($value ?? '-') . '</span>';
                                }
                            @endphp
                        </td>
                    @endforeach

                    {{-- Menyisipkan view aksi jika didefinisikan --}}
                    @if ($actionView)
                        <td class="text-center">
                            @include($actionView, ['row' => $row])
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + ($actionView ? 2 : 1) }}" class="text-center py-5 text-muted">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-inbox fs-1 text-secondary opacity-50 mb-3"></i>
                            <h6 class="fw-medium">Belum ada {{ $modelName }}</h6>
                            <p class="small mb-0">Data yang ditambahkan akan muncul di sini.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Render Pagination otomatis jika $collection menggunakan paginate() di Controller --}}
@if (method_exists($collection, 'links') && $collection->hasPages())
    <div class="mt-4 d-flex justify-content-end">
        {{ $collection->links('pagination::bootstrap-5') }}
    </div>
@endif
