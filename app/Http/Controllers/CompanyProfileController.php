<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;

class CompanyProfileController extends Controller
{
    #[Get('/')]
    public function index()
    {
        $layanan = [
            'Sistem ERP & POS',
            'Aplikasi Administrasi HR',
            'Otomatisasi Laporan Keuangan',
            'Verifikasi Dokumen QR Code'
        ];

        $reviews = Review::latest()->take(3)->get();

        return view('CompanyProfile.index', compact('layanan', 'reviews'));
    }

    #[Post('/kontak')]
    public function storeContact(Request $request)
    {
        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}