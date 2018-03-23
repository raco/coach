<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $fillable = ['category', 'content'];

    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content), 0, 50).'...';
    }
}
