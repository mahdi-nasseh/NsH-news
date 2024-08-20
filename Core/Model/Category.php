<?php

namespace Nshnews\Model;
use Illuminate\Database\Eloquent\Model;
include '.././vendor/autoload.php';

class Category extends Model{
    protected $table = 'category';

    protected $primaryKey = 'ID';

    protected $fillable = [
        "name",
        "parent"
    ];

    public function children(){
        return $this->hasMany(Category::class, 'parent', 'ID');
    }

    public function post(){
        return $this->belongsToMany(Post::class, 'category_item');
    }
}