<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitCycle extends Model
{
    protected $table = 'webaru_admit_cycles';

    protected $fillable = [

        'is_active',
        'year',
        'title',
        'schedules',
        'head_detail',
        'description',
        'files',
        'created_by',
        'updated_by',
    ];

    public function fileDetails()
{
    return $this->hasMany(\App\Models\WebaruAdmitCycleFileDetail::class, 'webaru_admitcycle_id');
}
}
