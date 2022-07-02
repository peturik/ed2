<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'keywords', 'description'];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
