<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitcycle extends Model
{
    protected $table = 'webaru_admitcycles';

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
    return $this->hasMany(\App\Models\WebaruAdmincycleFileDetail::class,'webaru_admitcycle_id');
}
}
