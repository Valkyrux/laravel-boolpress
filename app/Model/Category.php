<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Model\Post');
    }

    public function auto_generate_slug()
    {
        $slug = Str::slug($this->name, '-');
        $index = 0;
        $found_category = Category::where('slug', $slug)->first();
        while ($found_category) {
            $new_slug = $slug . '-' . $index;
            $found_category = Category::where('slug', $new_slug)->first();
            $index++;
        }
        return (empty($new_slug) ? $slug : $new_slug);
    }
}
