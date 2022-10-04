<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    
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
