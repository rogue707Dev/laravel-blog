<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','content','category_id','featured','slug','user_id'
    ];

    protected $dates = ['deleted_at'];

    public function getTitleAttribute($title)
    {
        return strtoupper($title);
    }

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public  function user()
    {
        return $this->belongsTo('App\User');
    }
}
