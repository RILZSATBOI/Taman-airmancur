<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Menampilkan Halaman Form Pembelian
    public function checkout(Ticket $ticket)
    {
        return view('order.checkout', compact('ticket'));
    }

    // Menyimpan Data Pesanan
    public function store(Request $request, Ticket $ticket)
    {
        // 1. Validasi Input (Jumlah Tiket)
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10', // Maksimal 10 tiket sekali beli
        ]);

        $quantity = $request->quantity;
        $totalPrice = $ticket->price * $quantity;

        // 2. Buat Data Order (Tabel Utama)
        // Kita gunakan Str::upper(Str::random(5)) untuk kode unik simpel
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_code' => 'TRX-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5)),
            'total_price' => $totalPrice,
            'status' => 'pending', // Status awal pending
        ]);

        // 3. Buat Data Order Item (Detail Tiket)
        $order->items()->create([
            'ticket_id' => $ticket->id,
            'quantity' => $quantity,
            'price_per_ticket' => $ticket->price,
        ]);

        // 4. Kurangi Stok Tiket (Opsional tapi bagus)
        $ticket->decrement('stock', $quantity);

        // 5. Redirect ke Homepage dulu (atau ke halaman riwayat nanti)
        return redirect()->route('home')->with('success', 'Berhasil membeli tiket! Silakan lakukan pembayaran.');
    }

    public function history()
    {
        // Mengambil order milik user yang login
        // KITA GUNAKAN EAGER LOADING 'items.ticket' AGAR HEMAT QUERY
        $orders = Order::with(['items.ticket'])
                    ->where('user_id', Auth::id())
                    ->latest() // Urutkan dari yang terbaru
                    ->get();

        return view('order.history', compact('orders'));
    }
}
