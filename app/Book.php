<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'publisher', 'genre',  'photo', 'review_id'];

    public function review() {
        return $this->hasMany('App\Review','book_id');
    }
}

