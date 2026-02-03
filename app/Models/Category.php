<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_ar', 'slug'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
