<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function isDone()
    {
        return $this->done ? 'Si' : 'No';
    }
}
