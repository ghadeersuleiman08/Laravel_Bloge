<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blogs::class);
    }
}
