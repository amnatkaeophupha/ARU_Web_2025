<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('webaru_admit_cycles', function (Blueprint $table) {
            if (Schema::hasColumn('webaru_admit_cycles', 'files')) {
                $table->dropColumn('files');
            }
        });
    }

    public function down(): void
    {
        Schema::table('webaru_admit_cycles', function (Blueprint $table) {
            $table->string('files')->nullable();
        });
    }
};

