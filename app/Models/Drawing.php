<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'svg_content',
        'downloads',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
