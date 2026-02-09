<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebaruGallery extends Model
{
    protected $fillable = ['title', 'image' , 'start_date', 'status', 'view_count', 'created_by', 'updated_by'];
}
