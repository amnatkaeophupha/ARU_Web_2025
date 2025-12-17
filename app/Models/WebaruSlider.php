<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruSlider extends Model
{
    protected $fillable = ['images', 'topic' , 'title', 'link_url', 'status','created_by','updated_by'];
}
