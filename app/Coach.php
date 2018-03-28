<?php

namespace App;

use App\Client;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use SoftDeletes;

    protected $table = 'coaches';

    protected $dates = ['deleted_at'];

    public function client()
    {
    	return $this->hasMany(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute() //$coach->full_name
    {
    	return $this->user->name.' '.$this->user->lastname ;
    }

    public function getSexCoachAttribute() //$coach->gender
    {
    	return $this->user->gender;
    }

}

 