<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'photo'
    ];

    public function coments() {

        return $this->hasMany(Coment::class);
        
    }
}
