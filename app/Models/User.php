<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable {
    protected $table = 'users';
    protected $guarded = ['id'];

    public function articles_pages() {
        return $this->hasMany('App\Models\Article', 'users_id');
    }
}