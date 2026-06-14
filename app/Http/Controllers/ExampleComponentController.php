<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Services\PelamarService;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('component')]
#[Middleware('web')]
class ExampleComponentController extends Controller
{
    protected $pelamarService;

    // Dependency Injection: Laravel akan otomatis memasukkan class PelamarService ke sini
    public function __construct(PelamarService $pelamarService)
    {
        $this->pelamarService = $pelamarService;
    }

    #[Get('/create')]
    public function form(){
        $model = new Pelamar();
        return view('components.example.form', compact('model'));
    }

    #[Post('/simpan')]
    public function store(Request $request)
    {
        // 1. Validasi Input form sesuai dengan field yang ada di Blade
        $validatedData = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'is_verified'     => 'nullable|boolean', // Menerima dari checkbox
            'jenis_kelamin'   => 'required|in:L,P',
            'lowongan_id'     => 'required|integer',
            'alamat_domisili' => 'nullable|string',
            'perusahaan_nama' => 'nullable|string',  // Input baru dari Modal
        ]);

        try {
            // 2. Simpan menggunakan Service
            $this->pelamarService->store($validatedData);

            return redirect('/component/create')->with('success', 'Data pelamar berhasil didaftarkan!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan: ' . $e->getMessage()]);
        }
    }

    // ==========================================
    // EDIT: Menampilkan Form dengan Data Lama
    // ==========================================
    #[Get('/edit/{id}')]
    public function edit($id)
    {
        $model = Pelamar::findOrFail($id);
        return view('components.example.form', compact('model'));
    }

    // ==========================================
    // UPDATE: Memperbarui Data ke Database
    // ==========================================
    #[Post('/update/{id}')]
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'is_verified'     => 'nullable|boolean',
            'jenis_kelamin'   => 'required|in:L,P',
            'lowongan_id'     => 'required|integer',
            'alamat_domisili' => 'nullable|string',
            'perusahaan_nama' => 'nullable|string',
        ]);

        try {
            $pelamar = Pelamar::findOrFail($id);
            
            // Perbarui menggunakan Service
            $this->pelamarService->update($pelamar, $validatedData);

            return back()->with('success', 'Data pelamar berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Gagal memperbarui: ' . $e->getMessage()]);
        }
    }
}
