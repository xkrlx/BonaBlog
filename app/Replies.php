<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
