<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruAdmitFaculty extends Model
{
    protected $table = 'webaru_admit_faculty';

    protected $fillable = [
        'faculty_name',
        'is_active',
    ];

    public function programs()
    {
        return $this->hasMany(WebaruAdmitProgram::class, 'faculty_id');
    }

    public function viewComments()
    {
        return $this->hasMany(\App\Models\WebaruAdmitViewComment::class, 'webaru_admit_faculty_id');
    }

    public function comments()
    {
        return $this->hasMany(WebaruAdmitViewComment::class,'webaru_admit_faculty_id');
    }
}
