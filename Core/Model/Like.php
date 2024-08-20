<?php

namespace Nshnews\Model;
use Illuminate\Database\Eloquent\Model;

class Like extends Model{
    protected $table = 'like';

    protected $guarded = [];

    protected $primaryKey = 'ID';

    public function likeable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}