<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment','posts_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }
}
