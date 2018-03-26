<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'excerpt', 'content', 'image', 'featured'];

    public function getShortExcerptAttribute()
    {
        return substr(strip_tags($this->excerpt), 0, 50).'...';
    }
}
