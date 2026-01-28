<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruFaqQuestion extends Model
{
    protected $table = 'webaru_faq_questions';

    protected $fillable = [
        'title','detail','category','email',
        'posted_ip','user_agent',
        'answer_count','status','is_spam',
    ];

    public function answers()
    {
        return $this->hasMany(WebaruFaqAnswer::class, 'question_id');
    }
}

