<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebaruComplaintCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'webaru_complaint_cases';

    /**
     * ฟิลด์ที่อนุญาตให้ mass assignment
     */
    protected $fillable = [
        'case_no',
        'pin_hash',

        'type_code',
        'channel',

        'subject',
        'detail',

        'is_anonymous',
        'contact_name',
        'contact_email',
        'contact_phone',

        'status',
        'priority',
        'assigned_to',

        'submitted_ip',
        'submitted_user_agent',

        'answered_at',
        'closed_at',

        'created_by',
        'updated_by',
    ];

    /**
     * cast ชนิดข้อมูล
     */
    protected $casts = [
        'is_anonymous' => 'boolean',
        'answered_at'  => 'datetime',
        'closed_at'    => 'datetime',
    ];

    /* =========================================================
     |  Relationships
     |=========================================================*/

    /**
     * ไฟล์แนบ
     */
    public function attachments()
    {
        return $this->hasMany(
            WebaruComplaintAttachment::class,
            'case_id'
        );
    }

    /**
     * log การดำเนินการ / ตอบกลับ
     */
    public function logs()
    {
        return $this->hasMany(
            WebaruComplaintCaseLog::class,
            'case_id'
        )->orderBy('created_at', 'asc');
    }

    /**
     * ผู้รับผิดชอบ (admin / staff)
     * (ถ้าใช้ User model ของ Laravel)
     */
    public function assignee()
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'assigned_to'
        );
    }

    /* =========================================================
     |  Scopes (ใช้ filter ง่าย ๆ)
     |=========================================================*/

    public function scopeType($query, string $type)
    {
        return $query->where('type_code', $type);
    }

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeOpen($query)
    {
        return $query->whereNotIn('status', ['CLOSED', 'REJECTED']);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'CLOSED');
    }

    /* =========================================================
     |  Helper / Business Logic
     |=========================================================*/

    /**
     * ตรวจว่าเป็นเคสไม่เปิดเผยตัวตน
     */
    public function isAnonymous(): bool
    {
        return (bool) $this->is_anonymous;
    }

    /**
     * ตรวจว่าเป็นเคส ITA (ทุจริต)
     */
    public function isCorruption(): bool
    {
        return $this->type_code === 'CORRUPTION';
    }

    /**
     * ตรวจว่าเป็นสายตรงอธิการ
     */
    public function isDirect(): bool
    {
        return $this->type_code === 'DIRECT';
    }

    /**
     * สถานะที่ประชาชนมองเห็นได้
     */
    public function publicLogs()
    {
        return $this->logs()->where('is_public', true);
    }
}


