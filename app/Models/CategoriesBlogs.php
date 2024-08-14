<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesBlogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'category_id',
    ];


    // public function blogs()
    //     // public function categories()
    // {
    //     return $this->hasMany(CategoriesBlogs::class, 'post_id');
    // }

    public function post()
    {
        return $this->belongsTo(Blogs::class, 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
