<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'blog_name', 'blog_email', 'blog_phone', 'blog_address'
    ];

    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
