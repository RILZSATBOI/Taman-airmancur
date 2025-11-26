<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // 1. Tampilan Publik (Untuk Pengunjung)
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('gallery.index', compact('galleries'));
    }

    // 2. Tampilan Admin (Form Upload & List)
    public function adminIndex()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery', compact('galleries'));
    }

    // 3. Proses Upload (Simpan Gambar)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'caption' => 'nullable|string|max:255',
        ]);

        // Simpan file ke folder 'public/galleries'
        $path = $request->file('image')->store('galleries', 'public');

        // Simpan info ke Database
        Gallery::create([
            'image_path' => $path,
            'caption' => $request->caption,
        ]);

        return back()->with('success', 'Foto berhasil diunggah!');
    }

    // 4. Hapus Foto
    public function destroy(Gallery $gallery)
    {
        // Hapus file fisik dari penyimpanan
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        // Hapus data dari database
        $gallery->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
