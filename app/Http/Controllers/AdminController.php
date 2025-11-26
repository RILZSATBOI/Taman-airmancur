<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Halaman Dashboard Utama
    public function index()
    {
        // Statistik Sederhana untuk Dashboard
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalRevenue = Order::where('status', 'paid')->sum('total_price');
        $totalUsers = User::where('role', 'user')->count();

        // Mengambil 5 order terbaru untuk cuplikan
        $latestOrders = Order::with('user')->latest()->take(5)->get();

        $chartData = Order::where('status', 'paid')
            ->where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        // Siapkan Label (Tanggal) dan Data (Uang)
        $chartLabels = $chartData->keys(); // ['2025-11-18', '2025-11-19', ...]
        $chartValues = $chartData->values(); // [50000, 150000, ...]

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'totalUsers',
            'latestOrders',
            'chartLabels',
            'chartValues' // <-- Kirim ke view
        ));
    }

    // Halaman Manajemen Semua Order
    public function orders()
    {
        // Ambil semua order, urutkan yang 'pending' di paling atas
        $orders = Order::with(['user', 'items.ticket'])
            ->orderByRaw("FIELD(status, 'pending', 'paid', 'cancelled')")
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }

    // Aksi: Setujui Pembayaran (Pending -> Paid)
    public function approveOrder(Order $order)
    {
        $order->update(['status' => 'paid']);

        return back()->with('success', "Order #{$order->order_code} berhasil disetujui/lunas!");
    }

    // ... method sebelumnya ...

    public function testimonials()
    {
        // Tampilkan yang belum diapprove di atas
        $testimonials = Testimonial::with('user')
            ->orderBy('is_approved', 'asc')
            ->latest()
            ->get();

        return view('admin.testimonials', compact('testimonials'));
    } 

    public function approveTestimonial(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => true]);
        return back()->with('success', 'Testimoni berhasil disetujui dan tayang!');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimoni dihapus.');
    }
}
