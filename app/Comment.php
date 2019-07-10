<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function pages()
    {
        return $this->belongsTo(Pages::class);
    }

    public function replies()
    {
        return $this->hasMany(Replies::class);
    }
}
