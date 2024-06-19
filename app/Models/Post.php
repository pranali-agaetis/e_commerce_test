<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'body',
      ];

      public function getRouteKeyName()
      {
          return 'slug';
      }

      public function category()
      {
          return $this->belongsTo(Category::class);
      }
}