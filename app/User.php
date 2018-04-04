<?php

namespace App;

use App\Coach;
use App\Client;
use App\Appointment;
use App\Notifications\MyResetPassword;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function getFullNameAttribute() //$coach->full_name
    {
        return $this->name.' '.$this->lastname ;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
    
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_client');
    }
}
