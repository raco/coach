<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category', 'description', 'image', 'coach_id'];

    public function showState()
    {
        return $this->state ? 'Activo' : 'Inactivo';
    }
}
