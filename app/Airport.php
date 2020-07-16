<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function arrivingFlights(){

        return $this->hasMany(Flight::class,'arrivalAriport_id');
    }
    public function departingFlights(){

        return $this->hasMany(Flight::class,'departureAriport_id');
    }

}
