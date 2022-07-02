<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'image',
        'slug',
        'active',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
