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
        Schema::rename(
            'webaru_admincycle_file_detail',
            'webaru_admit_cycle_file_detail'
        );
    }

    public function down(): void
    {
        Schema::rename(
            'webaru_admit_cycle_file_detail',
            'webaru_admincycle_file_detail'
        );
    }
};
