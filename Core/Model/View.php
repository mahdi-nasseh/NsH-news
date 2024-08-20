<?php

namespace Nshnews\Model;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'view';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'ip',
        'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}