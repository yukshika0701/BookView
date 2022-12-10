<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    // protected $fillable = ['amount', 'date', 'type_id', 'comment','user_id'];

    public function review() {
        return $this->hasMany('App\Review','book_id');
    }
}
