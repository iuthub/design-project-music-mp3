<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
public function user(){
    return $this->belongsToMany('App\User')->using('App\UserMusic');
}
    protected static function boot() {
        parent::boot();

        static::deleting(function($music) {
            $music->user()->delete();

        });
}
}
