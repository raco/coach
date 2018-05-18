<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyingrequest extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'coach_id',
        'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function getLiteralStateAttribute(Type $var = null)
    {
        return $this->state ? 'Entregado' : 'Pendiente';
    }
}
