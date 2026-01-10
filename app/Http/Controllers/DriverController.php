<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Ride;

class DriverController extends Controller
{
    public function updateLocation(Request $request) {
       $updated= Driver::where('id',$request->driver_id)
        ->update(['latitude'=>$request->lat,'longitude'=>$request->lng]);
        // return response()->json(['message'=>'Location updated']);
        return response()->json([
        'updated_rows' => $updated,
        'message' => 'Location updated'
    ]);
    }


    public function nearbyRides(Request $request) {
        $rides = Ride::where('status','pending')->get();
        return response()->json($rides);
    }


    public function requestRide(Ride $ride, Request $request) {
        $ride->update(['status'=>'driver_requested']);
        return response()->json(['message'=>'Ride requested']);
    }


    public function completeRide(Ride $ride) {
        $ride->driver_completed = true;
        if ($ride->passenger_completed) {
            $ride->status = 'completed';
        }
        $ride->save();
        return response()->json(['message'=>'Driver completed ride']);
    }
}
