<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitProgram extends Model
{
    protected $table = 'webaru_admit_program';

    protected $fillable = [
        'faculty_id',
        'program_code',
        'program_name',
        'is_active',
    ];

    public function faculty()
    {
        return $this->belongsTo(WebaruAdmitFaculty::class, 'faculty_id');
    }


    public function admitViews()
    {
        return $this->hasMany(WebaruAdmitView::class, 'webaru_admit_program_id');
    }
}
