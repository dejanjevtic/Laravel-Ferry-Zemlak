<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id', 'datetime', 'status', 'patient', 'doctor', 'clinic', 'specialty'
    ];
}
