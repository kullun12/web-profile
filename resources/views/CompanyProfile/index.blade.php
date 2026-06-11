@extends('layout.index')

@section('title', 'TechDev - Ekosistem Digital Enterprise')

@section('content')

    <header class="position-relative d-flex align-items-center justify-content-center text-center overflow-hidden" style="min-height: 90vh; background-color: #020617;" id="beranda">
        <div class="position-absolute top-0 start-50 translate-middle" style="width: 600px; height: 600px; background: radial-gradient(circle, rgba(56,189,248,0.15) 0%, rgba(2,6,23,0) 70%); border-radius: 50%; filter: blur(40px);"></div>
        <div class="position-absolute bottom-0 end-0" style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, rgba(2,6,23,0) 70%); border-radius: 50%; filter: blur(40px);"></div>

        <div class="container position-relative z-1 py-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                <span class="badge bg-primary rounded-pill">Baru</span>
                <span class="text-white-50 small fw-medium">Solusi POS & ERP Terintegrasi 2026</span>
            </div>
            
            <h1 class="display-2 fw-bolder text-white mb-4" style="letter-spacing: -1px;">
                Otomatisasi Bisnis <br> 
                <span style="background: linear-gradient(to right, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Tanpa Hambatan.</span>
            </h1>
            
            <p class="lead text-secondary mb-5 mx-auto" style="max-width: 650px; font-weight: 400; line-height: 1.6;">
                Kami membangun arsitektur sistem kustom yang stabil dan aman untuk menyederhanakan alur kerja operasional, rekrutmen, hingga pelaporan finansial perusahaan Anda.
            </p>
            
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="#layanan" class="btn btn-primary btn-lg px-5 rounded-pill fw-semibold shadow-lg" style="background: linear-gradient(135deg, #0ea5e9, #4f46e5); border: none;">Jelajahi Solusi</a>
                <a href="#kontak" class="btn btn-dark btn-lg px-5 rounded-pill fw-semibold" style="border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.05); backdrop-filter: blur(10px);">Konsultasi Gratis</a>
            </div>
        </div>
    </header>

    <section id="layanan" class="container py-5 mt-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase tracking-wider" style="color: #4f46e5;">Keahlian Teknis Kami</h6>
            <h2 class="fw-bolder mb-3 text-dark display-6" style="letter-spacing: -1px;">Infrastruktur Skala Enterprise</h2>
        </div>
        
        <div class="row g-4">
            @foreach($layanan as $index => $l)
            <div class="col-md-6 {{ $index == 0 || $index == 3 ? 'col-lg-7' : 'col-lg-5' }}">
                <div class="card border-0 p-4 p-md-5 h-100 rounded-5" style="background: #f8fafc; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.05)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4 shadow-sm" style="width: 55px; height: 55px; background: white; color: #4f46e5;">
                        <i class="bi {{ ['bi-hdd-network', 'bi-people', 'bi-file-earmark-spreadsheet', 'bi-qr-code-scan'][$index % 4] }} fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">{{ $l }}</h4>
                    <p class="text-secondary mb-0" style="line-height: 1.6;">Solusi kustom terintegrasi dengan standar keamanan tinggi dan performa optimal, disesuaikan dengan SOP bisnis harian Anda.</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="py-5 mt-5" style="background-color: #ffffff; border-top: 1px solid #f1f5f9;" id="review">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-8">
                    <h6 class="fw-bold text-uppercase tracking-wider" style="color: #4f46e5;">Kepercayaan Klien</h6>
                    <h2 class="fw-bolder text-dark display-6" style="letter-spacing: -1px;">Teruji di Lingkungan Produksi</h2>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="text-warning fs-5">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small fw-medium mt-1 mb-0">Rata-rata rating dari 50+ Klien Enterprise</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border border-light-subtle shadow-sm p-4 h-100 rounded-5 bg-white">
                        <div class="mb-4">
                            <i class="bi bi-quote fs-1" style="color: #cbd5e1;"></i>
                        </div>
                        <p class="text-secondary mb-5" style="line-height: 1.7; font-size: 1.05rem;">"Mekanisme sinkronisasi kasir (POS) dengan server ERP pusat sangat stabil. Dulu sering ada selisih data saat internet putus, sekarang sistem otomatis melakukan retry-sync di latar belakang. Luar biasa tangguh!"</p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; background: linear-gradient(135deg, #0ea5e9, #3b82f6); color: white; font-weight: 700;">
                                BS
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Budi Santoso</h6>
                                <small class="text-muted">Direktur Operasional Retail</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border border-light-subtle shadow-sm p-4 h-100 rounded-5 bg-white">
                        <div class="mb-4">
                            <i class="bi bi-quote fs-1" style="color: #cbd5e1;"></i>
                        </div>
                        <p class="text-secondary mb-5" style="line-height: 1.7; font-size: 1.05rem;">"Modul Master Lowongan yang dibangun sangat memudahkan pekerjaan administrasi kami. Pengaturan kuota pelamar dan integrasi data perusahaannya sangat rapi, aman, dan intuitif digunakan oleh tim."</p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; background: linear-gradient(135deg, #10b981, #059669); color: white; font-weight: 700;">
                                AM
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Anisa Maharani</h6>
                                <small class="text-muted">HR Manager</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border border-light-subtle shadow-sm p-4 h-100 rounded-5 bg-white">
                        <div class="mb-4">
                            <i class="bi bi-quote fs-1" style="color: #cbd5e1;"></i>
                        </div>
                        <p class="text-secondary mb-5" style="line-height: 1.7; font-size: 1.05rem;">"Otomatisasi pembuatan laporan Balance Sheet sangat akurat. Fitur ekspor datanya ke PDF dan Excel benar-benar mempercepat proses tutup buku bulanan tim finansial kami tanpa ada *bug*."</p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; background: linear-gradient(135deg, #f43f5e, #e11d48); color: white; font-weight: 700;">
                                HW
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Hendra Wijaya</h6>
                                <small class="text-muted">Finance & Accounting Lead</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-5 my-5">
        <div class="container">
            <div class="row align-items-stretch rounded-5 shadow-lg overflow-hidden border border-light-subtle" style="background-color: white;">
                <div class="col-lg-5 p-5 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, #0f172a, #1e293b); color: white;">
                    <span class="badge bg-white bg-opacity-10 text-white rounded-pill px-3 py-2 mb-4 align-self-start" style="backdrop-filter: blur(5px);">Konsultasi Gratis</span>
                    <h3 class="fw-bolder mb-4 display-6" style="letter-spacing: -1px;">Mari Bangun Sesuatu yang Hebat.</h3>
                    <p class="text-white-50 mb-5" style="font-size: 1.1rem; line-height: 1.6;">Ceritakan masalah operasional yang sedang Anda hadapi. Tim teknis kami akan merumuskan arsitektur *backend* yang paling efisien.</p>
                    
                    <div class="mt-auto">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="bi bi-envelope-fill text-white"></i>
                            </div>
                            <span class="fw-medium text-white-50">halo@techdev.id</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="bi bi-telephone-fill text-white"></i>
                            </div>
                            <span class="fw-medium text-white-50">+62 812-3456-7890</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7 p-4 p-md-5">
                    <div class="ps-lg-3 py-lg-4">
                        <h4 class="fw-bold mb-4 text-dark">Kirim Permintaan Proyek</h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 bg-success bg-opacity-10 text-success fw-medium mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form action="{{ url('/kontak') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control rounded-4 border-light-subtle bg-light shadow-none focus-ring focus-ring-primary" id="floatingEmail" placeholder="name@example.com" required style="padding-top: 1.625rem; padding-bottom: 0.625rem;">
                                <label for="floatingEmail" class="text-muted">Alamat Email Perusahaan</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="pesan" class="form-control rounded-4 border-light-subtle bg-light shadow-none focus-ring focus-ring-primary" id="floatingTextarea" placeholder="Jelaskan kebutuhan Anda" style="height: 150px; padding-top: 1.625rem;" required></textarea>
                                <label for="floatingTextarea" class="text-muted">Jelaskan Kebutuhan Sistem (ERP, API, POS, dll)</label>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 py-3 rounded-4 fw-bold shadow-sm" style="transition: all 0.3s ease;">
                                Kirim Pesan Sekarang <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection