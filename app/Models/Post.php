<?php

namespace App\Models;

use App\Models\PostMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function postMeta(){
        return $this->hasMany(PostMeta::class);
    }

}
