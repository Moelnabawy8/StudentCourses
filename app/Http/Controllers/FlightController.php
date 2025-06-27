<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightRequest;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function index()
    {
          $flights = DB::table("flights")->where("id",">",10)->get();
        // Alternatively, you can use Eloquent to retrieve the flights
        // $flights = Flight::where("id","<",15)->get();

        return view("flights", compact("flights"));
    }

    public function create()
    {

        return view("flights_create");
    }

    public function store(StoreFlightRequest $request)
    {
        // Validate the request data
        // You can use the StoreFlightRequest for validation if you have it set up
        // $validated = $request->validated();
        
        // Or you can validate manually like this:
    //      $validated = $request->validate([
    //     'name' => 'required|max:255',
        
    // ]);
 
        $data = [
            "flight_name" => $request->name,
            "updated_at" => now(),
            "created_at" => now()
        ];
        // Flight::create($data);

        // Optionally, you can use the fill method if you have mass assignment set up
        $flight = new Flight();
        $flight->fill($data);
        $flight->save();


        return redirect()->route("flight.index")->with("success", "Flight created successfully");
    }
    public function edit($id)
    {
        $flight = Flight::find($id);
        return view("flights_edit", compact("flight"));
    }
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);
        if (!$flight) {
            return redirect()->route("flight.index")->with("error", "Flight not found");
        }
         $flight->update([
        'flight_name' => $request->name,
        'updated_at' => now(),
    ]);
        // Alternatively, you can use the fill method if you have mass assignment set up
        // $flight->flight_name = $request->name;
        // $flight->updated_at = now();
        // $flight->save();

        return redirect()->route("flight.index")->with("success", "Flight updated successfully");
    }
    public function  destroy($id)
    {

         Flight::find($id);
        Flight:: where('id', $id)->delete();

        // Alternatively, you can use the findOrFail method to handle not found cases
        // $flight = Flight::find($id);
        // $flight->delete();
        return redirect()->route('flight.index')->with('success', 'تم حذف الرحلة بنجاح');
    }
    public function show($id)
    {
        $flight = Flight::find($id);
        if (!$flight) {
            return redirect()->route("flight.index")->with("error", "Flight not found");
        }
        return view("flight_show", compact("flight"));
    }
}
