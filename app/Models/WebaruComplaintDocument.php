<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebaruComplaintDocument extends Model
{
    protected $table = 'webaru_complaint_documents';

    protected $fillable = [
        'category',
        'title',
        'fiscal_year',
        'report_quarter',
        'agency',
        'file_url',
        'file_type',
        'published_at',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function getDownloadUrlAttribute(): string
    {
        if (Str::startsWith($this->file_url, ['http://', 'https://', '/'])) {
            return $this->file_url;
        }

        return Storage::url($this->file_url);
    }
}
