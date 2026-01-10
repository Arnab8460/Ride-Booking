<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $fillable = [
    'passenger_id','driver_id','pickup_lat','pickup_lng','dest_lat','dest_lng','status'
    ];


    public function passenger() {
        return $this->belongsTo(Passenger::class);
    }


    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}
