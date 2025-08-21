<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
    ];

    public function news() : HasMany
    {
        return $this->hasMany(News::class);
    }
}
