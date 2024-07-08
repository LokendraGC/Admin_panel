<?php

namespace App\Models;

use App\Models\Post;
use App\Models\CategoryMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function categoryMeta()
    {
        return $this->hasMany(CategoryMeta::class,'category_id');
    }
}
