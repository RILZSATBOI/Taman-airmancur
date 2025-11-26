<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Halaman publik: Menampilkan testimoni yang SUDAH DI-APPROVE saja
    public function index()
    {
        $testimonials = Testimonial::with('user')
            ->where('is_approved', true)
            ->latest()
            ->get();

        return view('testimonials.index', compact('testimonials'));
    }

    // Proses simpan testimoni baru
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        // Cek apakah user sudah pernah beli tiket yang lunas? (Opsional, untuk validitas)
        // Tapi untuk sekarang kita bebaskan semua user login boleh review.

        Testimonial::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => true, // Default: Belum tampil (Butuh moderasi)
        ]);

        return back()->with('success', 'Terima kasih! Ulasan Anda berhasil diterbitkan.');
    }
}
