<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Client;

class Coach extends Model
{
    protected $table = 'coaches';

    public function client()
    {
    	return $this->hasMany(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

 