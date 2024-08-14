<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];


    // public function posts()
    // {
    //     return $this->hasMany(CategoriesBlogs::class, 'category_id', 'id');
    // }

    // ================================================================

    public function categories() : HasMany
    {
        return $this->hasMany(CategoriesBlogs::class, 'category_id', 'id');
        //  عم اعمل علاقة مع الجدول الوسيط وعم قلو جبلي الكاتيجوريز اذا كان 
        //  تبع موديل الكاتيجوري id بساوي الcategory_id
    }


}
