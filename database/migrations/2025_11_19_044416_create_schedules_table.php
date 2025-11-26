<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('schelude') && !Schema::hasTable('schedule')) {
            Schema::rename('schelude', 'schedule');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('schedule') && !Schema::hasTable('schelude'))
            Schema::rename('schedule', 'schelude');
    }
};
