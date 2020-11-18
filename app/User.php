<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function book(){
        return $this->hasMany('App\Book', 'user_id', 'id');
    }
    public function borrowBook(){
        return $this->belongsToMany('App\Book', 'borrow_books');
    }
    public function borrowedBook(){
        return $this->hasOne('App\BorrowBook');
    }
}
