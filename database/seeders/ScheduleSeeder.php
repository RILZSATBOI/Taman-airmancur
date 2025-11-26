<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'title' => 'Sesi 1: Pesona Nusantara',
            'description' => 'Pertunjukan air mancur menari dengan iringan lagu-lagu daerah Indonesia.',
            'start_time' => '19:30:00',
            'end_time' => '20:00:00',
            'day_of_week' => 'Sabtu',
        ]);

        Schedule::create([
            'title' => 'Sesi 2: World Symphony',
            'description' => 'Atraksi air mancur megah dengan orkestra klasik dunia.',
            'start_time' => '20:30:00',
            'end_time' => '21:00:00',
            'day_of_week' => 'Sabtu',
        ]);

        Schedule::create([
            'title' => 'Sesi Santai Minggu Pagi',
            'description' => 'Air mancur statis untuk latar foto saat olahraga pagi (Car Free Day).',
            'start_time' => '06:00:00',
            'end_time' => '09:00:00',
            'day_of_week' => 'Minggu',
        ]);
    }
}
