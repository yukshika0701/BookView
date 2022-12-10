<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // protected $fillable = ['amount', 'date', 'type_id', 'comment','user_id'];
    
    public function nice() {
        return $this->hasMany('App\Nice');
    }
}
