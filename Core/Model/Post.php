<?php

namespace Nshnews\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'ID';


    public function category(){
        return $this->belongsToMany(Category::class, 'category_item');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }

    public function like()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function view(){
        return $this->hasMany(View::class);
    }
}