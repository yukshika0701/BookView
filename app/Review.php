<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['review', 'user_id', 'review_id'];
    
    public function nice() {
        return $this->hasMany('App\Nice', 'review_id');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}

