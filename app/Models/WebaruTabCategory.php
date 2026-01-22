<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebaruTabCategory extends Model
{
    protected $table = 'webaru_tabs_categories';

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'is_active',
    ];

    public function tabs()
    {
        return $this->hasMany(WebaruTab::class, 'category_id');
    }
}
