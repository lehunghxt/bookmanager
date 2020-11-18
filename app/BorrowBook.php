<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowBook extends Model
{
    public function books(){
        return $this->hasMany('App\Book' ,'id', 'book_id');
    }
}
