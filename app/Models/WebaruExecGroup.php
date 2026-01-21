<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruExecGroup extends Model
{
    protected $table = 'webaru_exec_groups';

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

    public function executives()
    {
        return $this->hasMany(WebaruExecExecutive::class, 'group_id');
    }

    /**
     * Scope: เฉพาะหมวดที่เปิดใช้งาน
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Scope: เรียงลำดับมาตรฐาน
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
