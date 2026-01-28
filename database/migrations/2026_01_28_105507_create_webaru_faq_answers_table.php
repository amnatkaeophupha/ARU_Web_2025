<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_faq_answers', function (Blueprint $table) {
            $table->id();

            // FK -> questions
            $table->foreignId('question_id')
                ->constrained('webaru_faq_questions')
                ->cascadeOnDelete();

            // Content
            $table->longText('answer'); // เนื้อหาคำตอบ

            // Who answered (ถ้ามีระบบ login)
            $table->unsignedBigInteger('answered_by_user_id')->nullable();
            $table->string('answered_by_name', 150)->nullable();

            // Flags
            $table->boolean('is_official')->default(true);  // คำตอบทางการ
            $table->string('status', 20)->default('published'); // published|hidden|pending
            $table->boolean('is_spam')->default(false);

            // Meta / audit
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();

            $table->timestamps();

            // Index
            $table->index(['question_id']);
            $table->index(['status']);
            $table->index(['is_spam']);
            $table->index(['created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_faq_answers');
    }
};

