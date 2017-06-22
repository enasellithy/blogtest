<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscrib extends Model
{
	use Notifiable;

    protected $table = 'subscribs';

    protected $fillable = [
        'mobile'
    ];
}
