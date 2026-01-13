<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitViewComment extends Model
{
    protected $table = 'webaru_admit_view_comments';

    protected $fillable = [
        'webaru_admit_cycle_id',
        'webaru_admit_faculty_id',
        'comment',
        'created_by',
    ];

    public function cycle()
    {
        return $this->belongsTo(WebaruAdmitCycle::class, 'webaru_admit_cycle_id');
    }

    public function faculty()
    {
        return $this->belongsTo(WebaruAdmitFaculty::class, 'webaru_admit_faculty_id');
    }
}
