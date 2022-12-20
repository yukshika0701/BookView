<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function review() {
        return $this->belongsTo('App\Review', 'review_id');
    }
    public function nice_exist($user_id, $review_id) {
        return Nice::where('user_id', $user_id)->where('review_id', $review_id)->exists();
        // dd(Nice::where('user_id', $user_id)->exists());

    }
}

