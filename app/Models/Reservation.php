<?php

namespace App\Models;

use App\Models\Resort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    public function resort()
    {
        //One To Many Inverse relation 
        return $this->belongsTo(Resort::class);
    }
}
