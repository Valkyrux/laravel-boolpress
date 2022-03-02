<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'phone',
        'address',
        'user_id'
    ];

    protected $table = 'userinfos';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
