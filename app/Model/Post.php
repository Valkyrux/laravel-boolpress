<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
