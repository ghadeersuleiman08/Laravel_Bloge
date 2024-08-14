<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',

    ];

    public function authors()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }



    public function categories()
    {
        return $this->hasMany(CategoriesBlogs::class, 'post_id', 'id');
    }
    // =====================================================================

    public function categoriesBlogs()
    {
        return $this->hasMany(CategoriesBlogs::class, 'post_id');
    }

}
