<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    protected $fillable = [
        'author_id',
        'news_category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'is_featured',
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function newsCategory() : BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function banner() : HasOne
    {
        return $this->hasOne(Banner::class);
    }
}
