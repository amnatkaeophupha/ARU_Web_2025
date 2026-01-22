<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebaruTab extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'files','active','created_by','updated_by','category_id'];

    public function category()
    {
        return $this->belongsTo(WebaruTabCategory::class, 'category_id');
    }

    public function scopeActive($q)
    {
        return $q->where('active', 'Y');
    }
}
