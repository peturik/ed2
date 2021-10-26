<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * Связь модели Category с моделью Post, позволяет получить
     * все посты, размещенные в текущей категории
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Возвращает список корневых категорий блога
     */
    public static function roots() {
        return self::where('parent_id', 0)->get();
    }
}
