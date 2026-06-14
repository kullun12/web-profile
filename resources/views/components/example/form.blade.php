@extends('layout.index')

@section('title', 'Form Data Pelamar')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <form action="{{ $model->id ? url('/pelamar/update/' . $model->id) : url('/pelamar/simpan') }}"
                    method="POST">
                    @csrf

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4 p-md-5">

                            <div class="mb-4 border-bottom pb-3">
                                <h4 class="fw-bold mb-1">{{ $model->id ? 'Ubah Data Pelamar' : 'Pendaftaran Pelamar Baru' }}
                                </h4>
                                <p class="text-muted small mb-0">Silakan lengkapi data kandidat pelamar di bawah ini.</p>
                            </div>

                            <div class="row text-start">
                                <x-form.input name="nama_lengkap" label="Nama Lengkap Pelamar" col="col-md-8"
                                    :model="$model" required placeholder="Masukkan nama sesuai KTP" />

                                <x-form.checkbox name="is_verified" label="Dokumen Terverifikasi" col="col-md-4"
                                    :model="$model" />

                                @php
                                    $opsiGender = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
                                @endphp
                                <x-form.radio name="jenis_kelamin" label="Jenis Kelamin" col="col-md-6" :options="$opsiGender"
                                    :model="$model" />

                                <x-form.select2 name="lowongan_id" label="Posisi Lowongan yang Dilamar" col="col-md-6"
                                    :model="$model" data-placeholder="Pilih posisi lowongan...">
                                    <option value="1">Backend Engineer (Laravel/Golang)</option>
                                    <option value="2">Fullstack Web Developer</option>
                                    <option value="3">Database Administrator (PostgreSQL)</option>
                                </x-form.select2>

                                <x-form.textarea name="alamat_domisili" label="Alamat Domisili Saat Ini" col="col-12"
                                    rows="4" :model="$model"
                                    placeholder="Tuliskan alamat lengkap beserta kode pos..." />

                                <x-form.input-search name="perusahaan_nama" label="Perusahaan Penempatan" col="col-md-12"
                                    :model="$model" modalTarget="modalCariPerusahaan"
                                    placeholder="Klik ikon cari untuk memilih perusahaan..." readonly />
                            </div>

                            <div class="mt-5 text-end border-top pt-4">
                                <a href="{{ url('/pelamar') }}" class="btn btn-light px-4 rounded-3 me-2 border">Batal</a>
                                <button type="submit" class="btn btn-primary px-5 rounded-3 fw-semibold shadow-sm">
                                    {{ $model->id ? 'Simpan Perubahan' : 'Daftarkan Pelamar' }}
                                </button>
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="modalCariPerusahaan" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
            
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold" id="modalLabel">Pilih Master Perusahaan</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-0">
                <div class="p-3 border-bottom bg-light">
                    <input type="text" class="form-control rounded-pill" placeholder="Ketik nama perusahaan untuk memfilter...">
                </div>

                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="ps-4">Kode</th>
                                <th>Nama Perusahaan</th>
                                <th>Bidang</th>
                                <th class="text-center pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 text-muted">PR-001</td>
                                <td class="fw-medium">PT. Teknologi Sejahtera</td>
                                <td>Software House</td>
                                <td class="text-center pe-4">
                                    <button type="button" class="btn btn-sm btn-primary px-3 rounded-pill" 
                                            onclick="pilihData('PT. Teknologi Sejahtera')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 text-muted">PR-002</td>
                                <td class="fw-medium">CV. Maju Bersama Digital</td>
                                <td>Digital Agency</td>
                                <td class="text-center pe-4">
                                    <button type="button" class="btn btn-sm btn-primary px-3 rounded-pill" 
                                            onclick="pilihData('CV. Maju Bersama Digital')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 text-muted">PR-003</td>
                                <td class="fw-medium">PT. Wardah Cosmetics (Cabang Surabaya)</td>
                                <td>Retail/FMCG</td>
                                <td class="text-center pe-4">
                                    <button type="button" class="btn btn-sm btn-primary px-3 rounded-pill" 
                                            onclick="pilihData('PT. Wardah Cosmetics (Cabang Surabaya)')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // Fungsi ini dipanggil dari atribut onclick di tombol "Pilih"
    function pilihData(namaPerusahaan) {
        
        // 1. Masukkan nilai ke dalam input field di form utama
        // Pastikan ID di sini ('perusahaan_nama') sesuai dengan atribut 'name' di komponen input
        document.getElementById('perusahaan_nama').value = namaPerusahaan;
        
        // 2. Ambil elemen modal berdasarkan ID
        let modalElement = document.getElementById('modalCariPerusahaan');
        
        // 3. Gunakan API Bootstrap 5 untuk mendapatkan instance modal yang sedang terbuka, lalu sembunyikan (hide)
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        if(modalInstance) {
            modalInstance.hide();
        }
    }
</script>
@endsection