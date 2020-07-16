<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function arrivalAirport(){
        return $this->belongsTo(Airport::class,'arrivalAriport_id');
    }

    public function departureAirport(){
        return $this->belongsTo(Airport::class,'departureAriport_id');
    }

    public  function passengers(){
        return $this->belongsToMany(Customer::class,'flight_customer');
    }

}
