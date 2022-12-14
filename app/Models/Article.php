<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
