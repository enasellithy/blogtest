<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'body', 'image', 'send', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Model\User');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment','post_id');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }
}
