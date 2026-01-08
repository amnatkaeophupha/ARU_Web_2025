<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmincycleFileDetail extends Model
{
    protected $table = 'webaru_admincycle_file_detail';

    protected $fillable = [
        'webaru_admitcycle_id',
        'file_name',
        'file_path',
        'uploaded_by',
    ];

    /**
     * ความสัมพันธ์กับตารางหลัก (webaru_admitcycles)
     */
    public function admitcycle()
    {
        return $this->belongsTo(WebaruAdmitcycle::class, 'webaru_admitcycle_id');
    }
}
