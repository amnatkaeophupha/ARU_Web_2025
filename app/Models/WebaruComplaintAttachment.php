<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebaruComplaintAttachment extends Model
{
    use HasFactory;

    protected $table = 'webaru_complaint_attachments';

    /**
     * ฟิลด์ที่อนุญาตให้ mass assignment
     */
    protected $fillable = [
        'case_id',

        'original_name',
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
        'sha256',

        'uploaded_by',
    ];

    /**
     * cast ชนิดข้อมูล
     */
    protected $casts = [
        'file_size' => 'integer',
    ];

    /* =========================================================
     |  Relationships
     |=========================================================*/

    /**
     * ไฟล์นี้เป็นของ case ไหน
     */
    public function case()
    {
        return $this->belongsTo(
            WebaruComplaintCase::class,
            'case_id'
        );
    }

    /**
     * ผู้ที่อัปโหลดไฟล์ (admin/staff)
     * null = ประชาชน
     */
    public function uploader()
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'uploaded_by'
        );
    }

    /* =========================================================
     |  Helper / Accessors
     |=========================================================*/

    /**
     * path สำหรับดาวน์โหลดไฟล์
     * (ปรับ disk ตามที่คุณใช้จริง เช่น public / local / s3)
     */
    public function getDownloadUrlAttribute(): string
    {
        return asset('storage/' . ltrim($this->file_path, '/'));
    }

    /**
     * ขนาดไฟล์แบบอ่านง่าย
     */
    public function getFileSizeHumanAttribute(): string
    {
        $bytes = $this->file_size ?? 0;

        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' B';
    }

    /**
     * ตรวจว่าเป็นไฟล์รูปหรือไม่
     */
    public function isImage(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }
}
