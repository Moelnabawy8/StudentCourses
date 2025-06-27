<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;


class CountryController extends Controller
{

    public function index()
    {
        
        $countries = Country::with("destination")->get();
        return view("countries.countries", compact("countries"));
    }


    public function create()
    {
        return view("countries.countries_create");
    }


    public function store(CountryRequest $request)
    {
        $data = [
            "country_name" => $request->name,
            "status" => $request->status,
            "created_at" => now(),
            "updated_at" => now()
        ];
        $country = new Country();
        $country->fill($data);
        $country->save();
        return redirect()->route("countries.index")->with("success", "تم ادخال الرحلة بنجاح");
    }


    public function show($id)
{
    $country = Country::find($id);

   

    return view("countries.countries_show", compact("country"));
}




    public function edit($id)
    {
        $country = Country::find($id);
        return view("countries.countries_edit", compact("country"));
    }


    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->country_name = $request->name;
        $country->status = $request->status;
        
        $country->created_at = now();
        $country->update();
        return redirect()->route("countries.index")->with("success", "updated successfully");
    }


    public function destroy($id)
    {
       $country= Country::find($id);
       $country->forceDelete();
        return redirect()->route("countries.index")->with("success", "Deleted successfully");
    }

    public function softDelete($id)
    {
        $country = Country::find($id);

        $country->delete();

        return redirect()->route("countries.index")->with("success", "تم الحذف المؤقت");
    }

    public function restore($id)
    {
        $country = Country::onlyTrashed()->find($id);

        $country->restore();
        return redirect()->route("countries.trashed")->with('success', 'تم استرجاع الرحلة بنجاح');
    }
   public function trashed()
{
    $countries = Country::onlyTrashed()->get();
    return view('countries.countries_trashed', compact('countries'));
}

}

