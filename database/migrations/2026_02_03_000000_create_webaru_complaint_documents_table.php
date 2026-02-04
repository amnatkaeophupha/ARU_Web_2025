<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_complaint_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['report', 'manual', 'form']);
            $table->string('title', 255);
            $table->unsignedSmallInteger('fiscal_year')->nullable();
            $table->unsignedTinyInteger('report_quarter')->nullable();
            $table->string('agency', 255)->nullable();
            $table->string('file_url', 512);
            $table->string('file_type', 20)->nullable();
            $table->date('published_at')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['category', 'is_active', 'sort_order'], 'webaru_docs_category_active_sort_idx');
            $table->index(['category', 'fiscal_year'], 'webaru_docs_category_fiscal_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_complaint_documents');
    }
};
