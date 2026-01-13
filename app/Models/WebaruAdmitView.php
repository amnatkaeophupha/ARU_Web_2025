<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitView extends Model
{
    protected $table = 'webaru_admit_view';

    protected $fillable = [
        'webaru_admit_cycle_id',
        'webaru_admit_program_id',
        'files',
        'comment',
    ];

    public function cycle()
    {
        return $this->belongsTo(
            WebaruAdmitCycle::class,
            'webaru_admit_cycle_id'
        );
    }

    public function program()
    {
        return $this->belongsTo(
            WebaruAdmitProgram::class,
            'webaru_admit_program_id'
        );
    }
}

