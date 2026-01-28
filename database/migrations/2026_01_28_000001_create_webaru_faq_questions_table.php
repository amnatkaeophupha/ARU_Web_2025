<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_faq_questions', function (Blueprint $table) {
            $table->id();

            // Core content
            $table->string('title');              // หัวข้อคำถาม
            $table->text('detail');               // รายละเอียดคำถาม
            $table->string('category', 250)
                  ->default('other');             // หมวดหมู่

            // Contact
            $table->string('email')->nullable();  // อีเมลติดต่อกลับ

            // Meta / audit
            $table->string('posted_ip', 45)->nullable();
            $table->string('user_agent')->nullable();

            // Counters & flags
            $table->unsignedInteger('answer_count')->default(0);
            $table->string('status', 20)
                  ->default('pending');           // pending|published|hidden
            $table->boolean('is_spam')->default(false);

            $table->timestamps();

            // Index
            $table->index(['category']);
            $table->index(['status']);
            $table->index(['is_spam']);
            $table->index(['created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_faq_questions');
    }
};
