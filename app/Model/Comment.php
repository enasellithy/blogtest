<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment','posts_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Model\Post','post_id');
    }
}
