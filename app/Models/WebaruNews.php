<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruNews extends Model
{
    protected $table = 'webaru_news';

    protected $fillable = [
        'title',
        'files',
        'status',
        'created_by',
        'updated_by',
    ];

}
