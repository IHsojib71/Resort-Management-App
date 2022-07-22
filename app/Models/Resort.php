<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resort extends Model
{
    use HasFactory;
    public function reservations()
    {
        //One To Many relation 
        return $this->hasMany(Reservation::class);
    }
}
