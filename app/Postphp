<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'body', 'image'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment','post_id');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }
}

