<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruCarousel extends Model
{
    protected $fillable = ['images', 'image_url', 'status','created_by','updated_by'];
}
