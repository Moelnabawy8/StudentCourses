<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $flights=DB::table("flights")->get();
        // Alternatively, you can use Eloquent to retrieve the flights
        // $flights = Flight::all();

        return view("flights", compact("flights"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("flights_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            "flight_name"=>$request->name,
            "created_at"=>now(),
            "updated_at"=>now()

        ];
        $flight=new Flight();
        $flight->fill($data);
        $flight->save();
        return redirect()->route("flights.index")->with("success","تم ادخال الرحلة بنجاح");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight=Flight::find($id);
        if (!$flight) {
            return redirect()->route("flights.index")->with("error", "Flight not found");
        }
        return view("flight_show",compact("flight"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flight=Flight::find($id);
        return view("flights_edit",compact("flight"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight=Flight::find($id);
        $flight->flight_name=$request->name;
        $flight->created_at=now();
        $flight->updated_at=now();
        $flight->update();
        $flight->save();
        return redirect()->route("flights.index")->with("success", "Flight updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $flight=Flight::find($id);
       $flight->destroy($id);
       return redirect()->route("flights.index")->with("success","تم حذف المنتج ");
    }
}
