<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;

class PassengerController extends Controller
{
    public function createRide(Request $request){
        $ride= Ride::create([
           'passenger_id'=>$request->passenger_id,
            'pickup_lat' => $request->pickup_lat,
            'pickup_lng' => $request->pickup_lng,
            'dest_lat' => $request->dest_lat,
            'dest_lng' => $request->dest_lng,
            'status' => 'pending'
        ]);
        return response()->json($ride, 201);
    }
    public function approveDriver(Ride $ride,Request $request){
        $ride->update([
            'driver_id' => $request->driver_id,
            'status' => 'approved'
        ]);
        return response()->json(['message'=>'Driver Approved']);
    }
    public function completeRide(Ride $ride){
        $ride->passenger_completed=true;
        if($ride->driver_completed){
            $ride->status='completed';
        }
        $ride->save();
        return response()->json(['message'=>'Passenger Ride Completed']);
    }
}
