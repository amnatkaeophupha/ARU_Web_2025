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
         Schema::rename('webaru_admitcycles', 'webaru_admit_cycles');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('webaru_admit_cycles', 'webaru_admitcycles');
    }
};
