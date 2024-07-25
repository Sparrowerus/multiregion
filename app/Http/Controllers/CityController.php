<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function index(Request $request, $city = null)
    {
        $cities = City::all();
        $currentCity = $request->attributes->get('currentCity');

        return view('home', [
            'cities' => $cities,
            'currentCity' => $currentCity
        ]);
    }

    public function store(CityRequest $request)
    {
        $city = City::create($request->validated());

        return response()->json($city, 201);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(null, 204);
    }

    public function about(Request $request, $city = null)
    {
        $cities = City::all();
        $currentCity = $request->attributes->get('currentCity');

        return view('about', [
            'cities' => $cities,
            'currentCity' => $currentCity
        ]);
    }

    public function news(Request $request, $city = null )
    {
        $cities = City::all();
        $currentCity = $request->attributes->get('currentCity');

        return view('news', [
            'cities' => $cities,
            'currentCity' => $currentCity
        ]);
    }


}
