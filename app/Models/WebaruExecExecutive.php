<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruExecExecutive extends Model
{
    protected $table = 'webaru_exec_executives';

    protected $fillable = [
        'group_id',
        'position_id',
        'name_th',
        'name_en',
        'position_text',
        'phone',
        'email',
        'photo',
        'person_order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'person_order' => 'integer',
    ];

    /* =========================
     |  Relationships
     |=========================*/

    // ผู้บริหาร → สังกัดหน่วยงาน
    public function group()
    {
        return $this->belongsTo(WebaruExecGroup::class, 'group_id');
    }

    // ผู้บริหาร → ตำแหน่ง
    public function position()
    {
        return $this->belongsTo(WebaruExecPosition::class, 'position_id');
    }

    /* =========================
     |  Query Scopes
     |=========================*/

    // แสดงเฉพาะรายการที่เปิดใช้งาน
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    // เรียงลำดับสำหรับหน้าเว็บ
    public function scopeOrdered($query)
    {
        return $query
            ->orderBy('position_id')
            ->orderBy('person_order');
    }
}

