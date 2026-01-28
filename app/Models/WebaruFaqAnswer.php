<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruFaqAnswer extends Model
{
    protected $table = 'webaru_faq_answers';

    protected $fillable = [
        'question_id','answer',
        'answered_by_user_id','answered_by_name',
        'is_official','status','is_spam',
        'ip_address','user_agent',
    ];

    public function question()
    {
        return $this->belongsTo(WebaruFaqQuestion::class, 'question_id');
    }
}

