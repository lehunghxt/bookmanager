<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category(){
        return $this->belongsTo('App\Category','cate_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getStatusBook(){
        return $this->hasOne('App\BorrowBook');
    }

    public function borrowedBook(){
        return $this->belongsToMany('App\User', 'borrow_books');
    }
}
