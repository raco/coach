<?php

namespace App;
use App\Coach;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model 
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  coach()
	{
		return $this->belongsTo(Coach::class);
	}

}
