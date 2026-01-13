<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_admit_view_comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('webaru_admit_cycle_id');
            $table->unsignedBigInteger('webaru_admit_faculty_id');

            $table->text('comment')->nullable();

            $table->timestamps();

            // กันซ้ำ: 1 รอบ + 1 คณะ มีได้ 1 comment
            $table->unique(['webaru_admit_cycle_id', 'webaru_admit_faculty_id'], 'uq_cycle_faculty');

            // FK constraints
            $table->foreign('webaru_admit_cycle_id')
                ->references('id')->on('webaru_admit_cycles')
                ->onDelete('cascade');

            $table->foreign('webaru_admit_faculty_id')
                ->references('id')->on('webaru_admit_faculty')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_admit_view_comments');
    }
};
