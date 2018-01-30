<?php

namespace App;
use App\Coach;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  coach()
	{
		return $this->belongsTo(Coach::class);
	}

}
