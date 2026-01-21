<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruExecPosition extends Model
{
    protected $table = 'webaru_exec_positions';

    protected $fillable = [
        'title_th',
        'title_en',
        'sort_order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    // ความสัมพันธ์: ตำแหน่งหนึ่งมีหลายคน (executives)
    public function executives()
    {
        return $this->hasMany(WebaruExecExecutive::class, 'position_id');
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('sort_order');
    }
}


