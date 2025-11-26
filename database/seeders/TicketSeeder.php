<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create([
            'name' => 'Tiket Masuk Reguler',
            'description' => 'Akses masuk ke area taman air mancur untuk satu orang.',
            'price' => 25000,
            'stock' => 500,
        ]);

        Ticket::create([
            'name' => 'Tiket VIP (Tribun Utama)',
            'description' => 'Posisi duduk terbaik di tribun tengah dengan pandangan lurus ke air mancur.',
            'price' => 50000,
            'stock' => 100,
        ]);

        Ticket::create([
            'name' => 'Tiket Anak-anak',
            'description' => 'Khusus pengunjung usia di bawah 10 tahun.',
            'price' => 15000,
            'stock' => 200,
        ]);
    }
}
