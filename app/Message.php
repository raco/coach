<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_name',
        'from_rol',
        'to_id',
        'to_name',
        'to_rol',
        'seen',
        'message'
    ];
}
