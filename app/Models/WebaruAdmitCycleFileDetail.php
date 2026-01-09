<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitCycleFileDetail extends Model
{
    protected $table = 'webaru_admit_cycle_file_detail';

    protected $fillable = [
        'webaru_admitcycle_id',
        'file_name',
        'file_path',
        'uploaded_by',
    ];

    public function admitCycle()
    {
        return $this->belongsTo(
            WebaruAdmitCycle::class,
            'webaru_admitcycle_id'
        );
    }
}

