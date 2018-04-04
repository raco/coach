<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function client()
    {
        return $this->belongsToMany(User::class, 'appointment_client');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id', 'id');
    }

}
