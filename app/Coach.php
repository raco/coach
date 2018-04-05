<?php

namespace App;

use App\User;
use App\Client;
use App\Appointment;
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

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'coach_id', 'id');
    }


    public function getFullNameAttribute() //$coach->full_name
    {
    	return $this->user->name.' '.$this->user->lastname ;
    }

    public function getSexCoachAttribute() //$coach->gender
    {
    	return $this->user->gender;
    }

    public static function hasClients($id)
    {
        return self::find($id)->client->count() ? true : false;
    }
}

 