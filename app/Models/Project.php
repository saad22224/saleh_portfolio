<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'thumbnail',
        'video_url',
        'lens_link',
        'sort_order',
        'is_featured'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
