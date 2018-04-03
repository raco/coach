<?php

namespace App;

use App\Coach;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Diet extends Model
{
    protected $fillable = ['category', 'content'];

    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content), 0, 50).'...';
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }
}
