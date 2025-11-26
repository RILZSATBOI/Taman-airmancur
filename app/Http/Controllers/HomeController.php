<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua jadwal, urutkan dari yang terbaru/terdekat
        // (Opsional: bisa pakai where('day_of_week', ...) untuk filter hari ini)
        $schedules = Schedule::all();

        // Ambil semua tiket
        $tickets = Ticket::all();

        // 3. Ambil 3 Testimoni Terbaru yang sudah diapprove
        $testimonials = Testimonial::with('user')
            ->where('is_approved', true)
            ->latest()
            ->take(3)
            ->get();

        // Kirim data ke view 'welcome'
        return view('welcome', compact('schedules', 'tickets', 'testimonials'));
    }
}
