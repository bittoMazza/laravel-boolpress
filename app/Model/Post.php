<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'thumb',
        'post_date',
        'post_content',
    ];

    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag');
    }
}
