<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
    }

    public function hasRole($roles)
    {
       if($this->roles()->where('name',$roles)->first())
       {
            return true;
       }
    }

    public function posts()
    {
        return $this->hasMany('App\Model\Post','user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role','user_role','user_id','role_id');
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             foreach($user->posts as $post)
             {
                $post->comment()->delete();
                $post->delete();
             }
        });
    }
}
