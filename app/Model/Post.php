<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'slug',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

    public function auto_generate_slug()
    {
        $slug = Str::slug($this->title, '-');
        $index = 0;
        $found_post = Post::where('slug', $slug)->first();
        while ($found_post) {
            $new_slug = $slug . '-' . $index;
            $found_post = Post::where('slug', $new_slug)->first();
            $index++;
        }
        return (empty($new_slug) ? $slug : $new_slug);
    }
}
