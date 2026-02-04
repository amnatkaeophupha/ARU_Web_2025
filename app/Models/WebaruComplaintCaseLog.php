<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebaruComplaintCaseLog extends Model
{
    use HasFactory;

    protected $table = 'webaru_complaint_case_logs';

    /**
     * ฟิลด์ที่อนุญาตให้ mass assignment
     */
    protected $fillable = [
        'case_id',

        'action',
        'from_status',
        'to_status',

        'remark',
        'is_public',

        'created_by',
        'created_ip',
    ];

    /**
     * cast ชนิดข้อมูล
     */
    protected $casts = [
        'is_public' => 'boolean',
    ];

    /* =========================================================
     |  Relationships
     |=========================================================*/

    /**
     * log นี้เป็นของ case ไหน
     */
    public function case()
    {
        return $this->belongsTo(
            WebaruComplaintCase::class,
            'case_id'
        );
    }

    /**
     * ผู้ที่กระทำ action (admin/staff)
     * null = system
     */
    public function creator()
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'created_by'
        );
    }

    /* =========================================================
     |  Scopes
     |=========================================================*/

    /**
     * แสดงเฉพาะ log ที่เปิดเผยให้ประชาชนเห็น (หน้าติดตาม)
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    /**
     * เรียงตามเวลาเก่า → ใหม่ (เหมาะกับ timeline)
     */
    public function scopeTimeline($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    /* =========================================================
     |  Helpers
     |=========================================================*/

    /**
     * label action ภาษาอ่านง่าย (ใช้ใน Blade)
     */
    public function getActionLabelAttribute(): string
    {
        return match ($this->action) {
            'created'        => 'รับเรื่อง',
            'assigned'       => 'มอบหมายงาน',
            'status_changed' => 'เปลี่ยนสถานะ',
            'reply'          => 'ตอบกลับ',
            'replied'        => 'ตอบกลับ',
            'closed'         => 'ปิดเรื่อง',
            'rejected'       => 'ไม่รับพิจารณา',
            default          => ucfirst($this->action),
        };
    }

    /**
     * ตรวจว่าเป็น log ที่ประชาชนเห็นได้หรือไม่
     */
    public function isPublic(): bool
    {
        return (bool) $this->is_public;
    }
}
