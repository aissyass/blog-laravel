<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'facebook', 'twitter', 'github', 'about', 'user_id'
    ];

    public function getAvatarAttribute($path)
    {
        if($path == null) {
            return asset('profiles/avatars/avatar.png');
        }
        else {
            return asset('profiles/avatars/' . $path);
        }
    }

    public function user(){
        return $this->belongsTo('App\Profile');
    }
}
