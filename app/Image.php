<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function getShortCommentAttribute()
    {
        return substr($this->comment, 0, 50).'...';
    }
}

